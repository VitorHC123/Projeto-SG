<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jogoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUsersController;
use App\Http\Controllers\UserController;


Route::get('/', [jogoController::class, 'index'])->name('principal');



Route::get('/trabalhe-conosco', function () {
    return view('cliente.trabalhe_conosco.index');
});

Route::get('/sobre', function () {
    return view('cliente.sobre.index');
});

Route::get('/noticias', function () {
    return view('cliente.noticias.index');
});

//BTN FOOTER

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
Route::middleware('auth')->group(function () {

    Route::get('/download', function () {
        return view('cliente.download.index');
    });

});

Route::get('/login-user', function(){
    return view('cliente.principal.login');
})->name('login-user');

Route::get('/registrar', function(){
    return view('cliente.principal.cadastrar');
});

Route::post('/logout-users', [AuthUsersController::class, 'logout'])->name('logout-users');
Route::post('/registrar', [AuthUsersController::class, 'registrar']);
Route::post('/login-user', [AuthUsersController::class, 'login']);








//ADMIN
Route::middleware('adminAuth')->group(function () {
    Route::get('/cadastro', [AuthUsersController::class, 'index'])->name('cadastro');
    Route::get('/adm', [AuthUsersController::class, 'qtdeUsers'])->name('qtdeUser'); 

    Route::get('/usuario/{id}/jogos', [UserController::class, 'getJogosBaixados'])->name('usuario.jogos');

    Route::get('/cadastro/upd/{id}', [AuthUsersController::class, 'BuscaAlterar'])->name('cad_alterar');
    Route::post("cadastro/udp", [AuthUsersController::class, 'SalvarAlterecao'])->name('cad_alt_salva');

    Route::delete('/cadastro/exc/{id}', [AuthUsersController::class, 'destroy'])->name('cad_excluir');

    Route::get('/adm-jogos', function () {
        return view('adm.admin_jogos.index');
    });

    Route::get('/adm-imagens', function () {
        return view('adm.admin_imagens.index');
    });
});


Route::get('/login-adm', function(){
    return view('adm.admin_principal.login');
})->name('login-adm');

Route::get('/registrar-adm', function(){
    return view('adm.admin_principal.cadastrar');
});

Route::post('/logout', [AuthController::class, 'logoutAdm'])->name('logout');
Route::post('registrar-adm', [AuthController::class, 'registrarAdm']);
Route::post('/login-adm', [AuthController::class, 'loginAdm'])->name('login-adm');
