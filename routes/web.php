<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jogoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImgsController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\UsersJogoController;


Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::get('/trabalhe-conosco', function () {
    return view('cliente.trabalhe_conosco.index');
});
Route::get('/sobre', function () {
    return view('cliente.sobre.index');
});
Route::get('/noticias', function () {
    return view('cliente.noticias.index');
});

// BTNs FOOTER
Route::get('/seguranca', function () {
    return view('seguranca.index');
});
Route::get('/suporte-ao-jogador', function () {
    return view('suporte_jogador.index');
});
Route::get('/missao', function () {
    return view('missao.index');
});

Route::middleware('auth')->group(function () {

    Route::get('/download', function () {
        return view('cliente.download.index');
    })->name('download');

    Route::get('/comprar/{id}', [MercadoPagoController::class, 'showCompra'])->name('comprar');

    Route::post('/pagamento', [MercadoPagoController::class, 'createPayment'])->name('pagamento');
    Route::post('/notificacao', [MercadoPagoController::class, 'notification'])->name('mercadopago.notification');
    Route::get('/mercadopago/success', [MercadoPagoController::class, 'paymentSuccess'])->name('mercadopago.success');
    Route::get('/pagamento-falha', [MercadoPagoController::class, 'paymentFailure'])->name('payment.failure');



});

Route::get('/login-user', function () {
    return view('cliente.principal.login');
})->name('login-user');
Route::get('/registrar', function () {
    return view('cliente.principal.cadastrar');
});
Route::post('/logout-users', [AuthUsersController::class, 'logout'])->name('logout-users');
Route::post('/registrar', [AuthUsersController::class, 'registrar']);
Route::post('/login-user', [AuthUsersController::class, 'login']);

// ADMIN
Route::middleware('adminAuth')->group(function () {

    Route::get('/adm', [AuthUsersController::class, 'qtdeUsers'])->name('qtdeUser');

    Route::get('/adm-jogos', [jogoController::class, 'index'])->name('adm.admin_jogos.index');
    Route::post('/jogo/salvar', [jogoController::class, 'SalvarNovoJogo'])->name('SalvarNovoJogo');
    Route::post('/jogo/atualizar/{jogo}', [jogoController::class, 'update'])->name('jogo_atualizar');
    Route::delete('/jogo/excluir/{jogo}', [jogoController::class, 'destroy'])->name('jogo_excluir');

    Route::get('/cadastro', [AuthUsersController::class, 'index'])->name('cadastro');
    Route::get('/cadastro/upd/{id}', [AuthUsersController::class, 'BuscaAlterar'])->name('cad_alterar');
    Route::post("cadastro/udp", [AuthUsersController::class, 'SalvarAlterecao'])->name('cad_alt_salva');
    Route::delete('/cadastro/exc/{id}', [AuthUsersController::class, 'destroy'])->name('cad_excluir');

    Route::get('/imagens', [ImgsController::class, 'index'])->name('imagens');
    Route::post('/imagens', [ImgsController::class, "SalvarNovaImagem"])->name('SalvarNovaImagem');
    Route::post('imagens/udp/{id}', [ImgsController::class, 'SalvarAlterecaoImagens'])->name('img_alt_salva');
    Route::delete('/imagens/exc/{id}', [ImgsController::class, 'destroyImagem'])->name('img_excluir');


    Route::get('/users_jogo', [UsersJogoController::class, 'index'])->name('users_jogo.index');
    Route::post('/users_jogo', [UsersJogoController::class, 'store'])->name('users_jogo.store');
});

Route::get('/login-adm', function () {
    return view('adm.admin_principal.login');
})->name('login-adm');
Route::get('/registrar-adm', function () {
    return view('adm.admin_principal.cadastrar');
});
Route::post('/logout', [AuthController::class, 'logoutAdm'])->name('logout');
Route::post('registrar-adm', [AuthController::class, 'registrarAdm']);
Route::post('/login-adm', [AuthController::class, 'loginAdm'])->name('login-adm');



