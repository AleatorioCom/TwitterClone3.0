<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

Route::get('/meulogin', function () {
    return view('Login');
})->name('meulogin');

Route::get('/meucadastro', function () {
    return view('Cadastro');
})->name('meucadastro');

Route::get('/', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/post', [PostController::class, 'store'])
    ->middleware('auth')
    ->name('post.store');

Route::post('/like/{id}', [LikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('like.toggle');

Route::get('/user/{id}', [ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('user.profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
