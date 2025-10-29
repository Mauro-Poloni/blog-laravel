<?php

use App\Http\Controllers\ComentaryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// Mostrar todos los pots
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Mostrar info del post

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Mostrar las categorias

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

// Mostrar las etiquetas

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

// Mostrar los comentarios

Route::resource('comentary', ComentaryController::class)->except('show')->names('posts.comentary');

// Mostrar los likes

Route::post('/like/{id}', [LikeController::class, 'like'])->name('posts.like');
Route::post('/unlike/{id}', [LikeController::class, 'unlike'])->name('posts.unlike');

// Direccion donde van las imagenes ckeditor

route::post('image/upload', [ImageController::class, 'upload'])->name('image.upload');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
