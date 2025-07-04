<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('post/{slug}', [\App\Http\Controllers\PostController::class, 'detail'])->name('post.detail');
Route::get('/artikel', [PostController::class, 'showArtikel'])->name('artikel');
Route::get('/penulis', [PostController::class, 'penulis'])->name('penulis');