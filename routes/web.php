<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/* 🏠 Página inicial */
Route::get('/', function () {
    return view('welcome');
});

/* 🔐 LOGIN PERSONALIZADO */
Route::get('/meulogin', function () {
    return view('Login');
})->name('meulogin');

/* 🔐 CADASTRO PERSONALIZADO */
Route::get('/meucadastro', function () {
    return view('Cadastro');
})->name('meucadastro');

/* 🔥 DASHBOARD (COM POSTS) */
Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/* ✍️ CRIAR POST */
Route::post('/post', [PostController::class, 'store'])
    ->middleware('auth')
    ->name('post.store');

/* ❤️ CURTIR / DESCURTIR */
Route::post('/like/{id}', [LikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('like.toggle');

/* 👤 PERFIL DO USUÁRIO (NOVO 🔥) */
Route::get('/user/{id}', [ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('user.profile');

/* 👤 PERFIL PADRÃO DO LARAVEL */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* 🔑 ROTAS DO LARAVEL (login real) */
require __DIR__.'/auth.php';