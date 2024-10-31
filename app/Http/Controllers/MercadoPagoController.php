<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;
use App\Models\Jogo;
use App\Models\Imgs;
use App\Models\User_jogo;
use Illuminate\Support\Facades\Auth;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        SDK::setAccessToken(config('services.mercadopago.access_token'));
    }

    public function index(Request $request)
    {
        $jogo = Jogo::all();
    }

    public function showCompra(Request $request, $id)
    {
        $jogo = Jogo::findOrFail($id);

        return view('cliente.download.mercado_pago', ['jogo' => $jogo]);
    }

    /**
     * Cria a preferência de pagamento e redireciona para a view de pagamento.
     */
    public function createPayment(Request $request)
    {
        $jogoId = $request->input('id');
        $jogo = Jogo::findOrFail($jogoId);

        $preference = new Preference();
        $item = new Item();
        $item->title = $jogo->nome;
        $item->quantity = 1;
        $item->unit_price = $jogo->preco;

        $preference->items = [$item];
        $preference->back_urls = [
            'success' => route('mercadopago.success'),
            'failure' => route('payment.failure'),
        ];
        $preference->auto_return = 'approved';
        $preference->external_reference = $jogoId; 
        $preference->save();

        return redirect($preference->init_point);
    }

    /**
     * Recebe notificações de status de pagamento (webhook).
     */
    public function notification(Request $request)
    {
        $data = $request->all();
        \Log::info('Notificação do Mercado Pago:', $data);

        if (isset($data['type']) && $data['type'] === 'payment') {
            $paymentId = $data['data']['id'];
            $paymentStatus = $data['data']['status'];
            return response()->json(['status' => 'sucesso'], 200);
        }

        return response()->json(['status' => 'ignorado'], 200);
    }

    private function saveSale($userId, $userName, $jogoId, $paymentId, $status)
    {
        User_Jogo::create([
            'fk_user_id' => $userId,
            'nome_user' => $userName,
            'fk_jogo_id' => $jogoId,
            'valor' => $status === 'approved' ? $this->getGamePrice($jogoId) : 0,
            'payment_id' => $paymentId,
            'status' => $status,
        ]);
    }

    private function getGamePrice($jogoId)
    {
        $jogo = Jogo::find($jogoId);
        return $jogo ? $jogo->preco : 0;
    }

    /**
     * Redireciona o usuário após o pagamento bem-sucedido.
     */
    public function paymentSuccess(Request $request)
    {
        $payment_id = $request->query('payment_id');
        $status = $request->query('status');
        $jogo_id = $request->query('external_reference');

        $jogo = Jogo::find($jogo_id);

        if ($jogo) {
            $user = Auth::user();
            if ($user) {
                $userName = $user->name;
                $this->saveSale($user->id, $userName, $jogo_id, $payment_id, $status);
            }
        }

        return view('cliente.download.index', compact('payment_id', 'status', 'jogo'));
    }

    public function paymentFailure()
    {
        return view('payment_failure');
    }

    public function paymentPending()
    {
        return view('payment_pending');
    }
}
