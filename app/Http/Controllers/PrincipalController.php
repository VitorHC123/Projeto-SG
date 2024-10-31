<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Imgs;
use App\Models\User_Jogo;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\User;
use App\Http\Controllers\AuthUsersController;
use Illuminate\Support\Facades\Auth;


class PrincipalController extends Controller
{
    public function index(){
        $jogo = Jogo::with(['genero', 'imagemPerfil'])->get();
        $imagens = Imgs::with(['jogos'])->get();
        $generos = Genero::all();

        return view('cliente.principal.index', compact('jogo', 'imagens' , 'generos'));
    }

    public function BaixarJogo(Request $request){
        $id = $request->input('id');
        Auth::loginUsingId($id);
        $Novo = new User_Jogo();
        $Novo->jogos()->attach($id);

        return redirect()->route('download');
    }


}
