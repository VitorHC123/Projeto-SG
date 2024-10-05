<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jogoController;

Route::get('/', [jogoController::class, 'index'])->name('principal');

Route::get('/login', function () {
    return view('cliente.login.login');
});

Route::get('/cadastrar', function () {
    return view('cliente.login.cadastrar');
});

Route::get('/trabalhe-conosco', function () {
    return view('cliente.trabalhe_conosco.index');
});

Route::get('/sobre', function () {
    return view('cliente.sobre.index');
});

Route::get('/noticias', function () {
    return view('cliente.noticias.index');
});

//BTN BAIXE AGORA
Route::get('/download', function () {
    return view('download.index');
});

Route::get('/seguranca', function () {
    return view('seguranca.index');
});

Route::get('/suporte-ao-jogador', function () {
    return view('suporte_jogador.index');
});

Route::get('/missao', function () {
    return view('missao.index');
});

//--------------------------------------------

//ADMIN

Route::get('/adm', function () {
    return view('adm.admin_principal.index');
});

Route::get('/adm-cadastro', function () {
    return view('adm.admin_cadastro.index');
});

Route::get('/adm-jogos', function () {
    return view('adm.admin_jogos.index');
});

Route::get('/adm-imagens', function () {
    return view('adm.admin_imagens.index');
});

