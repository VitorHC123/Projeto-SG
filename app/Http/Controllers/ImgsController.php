<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imgs;
use App\Models\Jogo;

class ImgsController extends Controller
{
    public function index()
    {
        $imgs = Imgs::all();
        return view('adm.admin_imagens.index', compact('imgs'));
    }


    public function SalvarNovaImagem(Request $request)
    {
        $request->validate([
            'img_nome' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $img_nome = $request->input('img_nome');

        if ($request->hasFile('img')) {
            $imageName = $request->file('img')->store('imagens', 'public');
        } else {
            return redirect()->back()->with('error', 'Falha ao enviar a imagem!');
        }

        $imgs = new Imgs();
        $imgs->img_nome = $img_nome;
        $imgs->img = $imageName;
        $imgs->save();

        return redirect()->route('imagens')->with('success', 'Imagem enviada com sucesso!');
    }



    public function SalvarAlterecaoImagens(Request $request, $id)
    {
        $request->validate([
            'img_nome' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgs = Imgs::find($id);
        $imgs->img_nome = $request->input('img_nome');

        if ($request->hasFile('img')) {
            $imageName = $request->file('img')->store('imagens', 'public');
            $imgs->img = $imageName;
        }

        $imgs->save();

        return redirect()->route('imagens')->with('success', 'Alteração feita com sucesso!');
    }

    public function destroyImagem($id)
{
    // Verifica se a imagem está sendo usada na tabela `jogo`
    Jogo::where('fk_id_imgs', $id)->update(['fk_id_imgs' => null]);

    $imgs = Imgs::find($id);

    if ($imgs) {
        $imgs->delete();
    }

    return redirect()->route('imagens')->with('success', 'Imagem removida com sucesso!');
}
}
