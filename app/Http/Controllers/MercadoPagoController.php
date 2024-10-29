<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        // Definindo o token de acesso do Mercado Pago
        SDK::setAccessToken(config('services.mercadopago.access_token'));
    }

    /**
     * Cria a preferência de pagamento e redireciona para a view de pagamento.
     */
    public function createPayment()
    {
        // Cria uma nova preferência de pagamento
        $preference = new Preference();

        // Configura o item do pagamento (exemplo)
        $item = new Item();
        $item->title = 'Produto Exemplo';
        $item->quantity = 1;
        $item->unit_price = 100.00; // preço do produto em reais

        $preference->items = [$item];

        // URLs de redirecionamento após o pagamento
        $preference->back_urls = [
            'success' => route('payment.success'),
            'failure' => route('payment.failure'),
            'pending' => route('payment.pending')
        ];
        $preference->auto_return = 'approved';

        // Salva a preferência no Mercado Pago
        $preference->save();

        return view('mercado_pago', ['preference' => $preference]);
    }

    /**
     * Recebe notificações de status de pagamento (webhook).
     */
    public function notification(Request $request)
    {
        $data = $request->all();

        // Log de notificação para fins de depuração
        \Log::info('Notificação do Mercado Pago:', $data);

        if (isset($data['type']) && $data['type'] === 'payment') {
            // Lógica para atualizar status do pagamento no banco de dados
            $paymentId = $data['data']['id'];
            $paymentStatus = $data['data']['status'];

            // Atualize o status do pagamento no banco de dados conforme o ID do pagamento
            // Exemplo:
            // Payment::where('payment_id', $paymentId)->update(['status' => $paymentStatus]);

            return response()->json(['status' => 'sucesso'], 200);
        }

        return response()->json(['status' => 'ignorado'], 200);
    }

    /**
     * Redireciona o usuário após o pagamento bem-sucedido.
     */
    public function paymentSuccess()
    {
        return view('payment_success');
    }

    /**
     * Redireciona o usuário se o pagamento falhar.
     */
    public function paymentFailure()
    {
        return view('payment_failure');
    }

    /**
     * Redireciona o usuário se o pagamento ficar pendente.
     */
    public function paymentPending()
    {
        return view('payment_pending');
    }
}