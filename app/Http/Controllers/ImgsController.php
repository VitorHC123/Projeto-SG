<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imgs;

class ImgsController extends Controller
{
    public function index(){
        $imgs = Imgs::all();
        return view('cliente.principal.index', compact('imgs'));
    }

    public function SalvarNovaImagem(Request $request){
        //INSERT INTO categoria (cat_nome, cat_descricao)
        //               VALUES ('$cat_nome, $cat_descricao')
        //id	nome	descricao	preco	jogo_img	fk_id_genero	fk_id_imgs	created_at	updated_at	

        $img_nome = $request->input('img_nome');
        $img = $request->input('img');

        $imgs = new Imgs();
        $imgs->img_nome = $img_nome;
        $imgs->img = $img;
        $imgs->save();

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

    public function update(Request $request, Imgs $imgs)
    {
        $request->validate([
            'id' => 'required|exists:categorias,id',
            'img_nome' => 'required|string|max:255',
            'img' => 'nullable|string',
        ]);

        $imgs->update($request->all());
        return redirect()->route('adm.admin_principal.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Imgs $imgs)
    {
        $imgs->delete();
        return redirect()->route('adm.admin_principal.index')->with('success', 'Produto removido com sucesso!');
    }
}
