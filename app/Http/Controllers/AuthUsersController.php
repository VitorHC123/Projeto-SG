<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jogo;
use App\Models\Imgs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthUsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('adm.admin_cadastro.index', compact('users'));
    }

    public function qtdeUsers()
    {
        $qtdaUsers = User::count();
        $users = User::all();
        $qtdaJogos = Jogo::count();   
        $totalPreco = Jogo::sum('preco'); 
        $totalImgs = Imgs::count('img'); 
        return view('adm.admin_principal.index', compact('qtdaUsers', 'qtdaJogos', 'totalPreco', 'users', 'totalImgs'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('cadastro')->with('success', 'Usuário removido com sucesso!');
    }

    public function BuscaAlterar($id)
    {
        $users = User::where("id", $id)->first();

        return view('cadastro.alterar', compact('users'));
    }

    public function SalvarAlterecao(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($validatedData['id']);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];


        if ($request->input('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('cadastro')->with('success', 'Usuário atualizado com sucesso!');
    }



    public function login(Request $request)
    {
        // Validação dos dados
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Verificar as credenciais e autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Login bem-sucedido
            $request->session()->regenerate();

            return redirect()->route('principal');
        }

        // Se as credenciais estiverem erradas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }


    public function registrar(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirecionar ou retornar uma resposta
        return view('cliente.principal.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('principal');
    }
}
