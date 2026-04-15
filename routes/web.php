<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Login e Cadastro
Route::get('/meulogin', function () {
    return view('Login');
})->name('meulogin');

Route::get('/meucadastro', function () {
    return view('Cadastro');
})->name('meucadastro');

// Rota de registro (POST do formulário de Cadastro.blade.php)
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Rota do Menu (após login/cadastro)
Route::get('/menu', function () {
    return view('Menu');
})->middleware('auth')->name('menu');

// Dashboard (posts)
Route::get('/', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/post', [PostController::class, 'store'])
    ->middleware('auth')
    ->name('post.store');

Route::post('/like/{id}', [LikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('like.toggle');

// Perfil
Route::get('/user/{id}', [ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('user.profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/menu', function () {
    return view('Menu');
})->middleware('auth')->name('menu');


// Rotas padrão de autenticação (login/logout)
require __DIR__.'/auth.php';
