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

    public function mostrar($id) {
        $jogo = Jogo::findOrFail($id);
        return view('jogo.mostrar', compact('jogo'));
    }
}
