<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Meu Laravel está funcionando 🚀';
});

Route::get('/users', function() {
    return 'Minha pagina de usuario';
});

Route::get('/Corrida', function() {
    return 'Corrida tal';
});

Route::get('/usuario/{id}', function ($id) {
    return "Usuário: $id";
});

Route::get('/dashboard', function () {
    return 'Dashboard';
})->name('dashboard');