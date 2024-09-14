<?php

use App\Http\Controllers\produtosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tamplate.principal.index');
});

Route::get('/estoque', function () {
    return view('tamplate.estoque.index');
});

Route::get('/produto', function () {
    return view('tamplate.produto.index');
});

Route::get('/contato', function () {
    return view('tamplate.contato.index');
});


Route::get('/sobre', function () {
    return view('tamplate.sobre.index');
});



