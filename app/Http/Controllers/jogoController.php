<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Imgs;
use App\Models\Genero;

class JogoController extends Controller
{
    public function index(){
        $jogo = Jogo::with(['genero', 'imagemPerfil', 'imagemFundo'])->get(); 
        $imagens = Imgs::all(); 
        $generos = Genero::all();
        return view('adm.admin_jogos.index', compact('jogo', 'imagens', 'generos'));
    }

    public function index2(){
        $jogo = Jogo::all(); 
        return view('cliente.principal.index', compact('jogo'));
    
    }
    

    public function SalvarNovoJogo(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string',
        'preco' => 'required|numeric|min:0',
        'fk_id_imgs' => 'required|exists:imgs,id', 
        'jogo_img' => 'required|exists:imgs,id', 
        'fk_id_genero' => 'required|exists:genero,id',
    ]);

    $jogo = new Jogo();
    $jogo->nome = $request->input('nome');
    $jogo->descricao = $request->input('descricao');
    $jogo->preco = $request->input('preco');
    $jogo->fk_id_imgs = $request->input('fk_id_imgs'); 
    $jogo->jogo_img = $request->input('jogo_img'); 
    $jogo->fk_id_genero = $request->input('fk_id_genero');
    $jogo->save();

    return redirect()->route('adm.admin_jogos.index')->with('success', 'Jogo salvo com sucesso!');
}
 


    public function update(Request $request, Jogo $jogo)
    {
        $request->validate([
            'id' => 'required|exists:jogo,id', 
            'nome' => 'required|string|max:255', 
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'genero' => 'required|exists:genero,id',  
            'jogo_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $jogo->update($request->except(['jogo_img', 'img'])); 

        if ($request->hasFile('jogo_img')) {
            $jogo->jogo_img = $request->file('jogo_img')->store('imagens', 'public');
        }

        if ($request->hasFile('img')) {
            $jogo->fk_id_imgs = $request->file('img')->store('imagens', 'public');
        }

        $jogo->save(); 

        return redirect()->route('adm.admin_jogos.index')->with('success', 'Jogo atualizado com sucesso!');
    }

    public function destroy(Jogo $jogo)
    {
        $jogo->delete();
        return redirect()->route('adm.admin_jogos.index')->with('success', 'Jogo removido com sucesso!'); 
    }
}
