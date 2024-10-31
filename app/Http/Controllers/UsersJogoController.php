<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jogo;
use App\Models\User_Jogo;
use Illuminate\Http\Request;

class UsersJogoController extends Controller
{
    // Exibir dados na tela
    public function index()
    {
        $dados = User_Jogo::with(['usuario', 'jogo'])->get();
        return view('adm.admin_userjogo.index', compact('dados'));
    }

    // Armazenar dados no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'fk_user_id' => 'required|exists:users,id',
            'fk_jogo_id' => 'required|exists:jogo,id',
            'valor' => 'required|numeric',
            'nome_user' => 'required|string|max:255'
        ]);

        User_Jogo::create([
            'fk_user_id' => $request->fk_user_id,
            'fk_jogo_id' => $request->fk_jogo_id,
            'valor' => $request->valor,
            'nome_user' => $request->nome_user
        ]);

        return redirect()->route('users_jogo.index')->with('success', 'Dados armazenados com sucesso.');
    }
}
