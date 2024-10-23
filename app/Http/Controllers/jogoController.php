<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;

class jogoController extends Controller
{
    public function index(){
        $jogo = Jogo::all();
        return view('cliente.principal.index', compact('jogo'));
    }

    
    public function getJogosBaixadosPorUsuario($userId)
    {
        $jogos = DB::table('users_jogo')
                    ->join('jogo', 'users_jogo.fk_jogo_id', '=', 'jogo.id')
                    ->join('users', 'users_jogo.fk_user_id', '=', 'users.id')
                    ->where('users.id', $userId)
                    ->select('jogo.*', 'users_jogo.download_date')
                    ->get();

        return view('user.jogos', compact('jogos'));
    }

    public function SalvarNovoJogo(Request $request){
        //INSERT INTO categoria (cat_nome, cat_descricao)
        //               VALUES ('$cat_nome, $cat_descricao')
        //id	nome	descricao	preco	jogo_img	fk_id_genero	fk_id_imgs	created_at	updated_at	

        $nome = $request->input('nome');
        $descricao = $request->input('descricao');
        $preco = $request->input('preco');
        $jogo_img = $request->input('jogo_img');
        $fk_id_genero = $request->input('fk_id_genero');
        $fk_id_imgs = $request->input('fk_id_imgs');

        $jogo = new Jogo();
        $jogo->nome = $nome;
        $jogo->descricao = $descricao;
        $jogo->preco = $cat_nome;
        $jogo->jogo_img = $jogo_img;
        $jogo->fk_id_genero = $fk_id_genero;
        $jogo->fk_id_imgs = $fk_id_imgs;
        $jogo->save();

        return redirect('adm.admin_principal.index');
    }

    // public function show(Jogo $jogo)
    // {
    //     return view('produtos.show', compact('produto'));
    // }

    // public function edit(Jogo $jogo)
    // {
    //     $jogo = Jogo::all();
    //     return view('produtos.edit', compact('produto', 'categorias'));
    // }

    public function update(Request $request, Jogo $jogo)
    {
        $request->validate([
            'id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:255',
            'prod_descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0', 
            'jogo_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fk_id_genero' => 'required|exists:generos,id', 
            'fk_id_imgs' => 'nullable|exists:imagens,id',
        ]);

        $jogo->update($request->all());
        return redirect()->route('adm.admin_principal.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Jogo $jogo)
    {
        $jogo->delete();
        return redirect()->route('adm.admin_principal.index')->with('success', 'Produto removido com sucesso!');
    }
}
