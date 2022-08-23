<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create']);
Route::post('/login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy']);

Route::post('/newsletter', NewsletterController::class);