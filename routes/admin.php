<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

// Crud de usuarios

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');

// Crud de roles

Route::resource('roles', RolController::class)->except('show')->names('admin.roles');

// Crud Category

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

// Crud etiquetas

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

// Crud posts

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

