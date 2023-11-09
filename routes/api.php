<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('posts/{s}', [PostController::class, 'VerPublicaciones']);

Route::post('posts', [PostController::class, 'store']);
Route::post('posts/{id}/comentarios', [PostController::class, 'Hacercomentario']);
Route::post('posts/{id}/like', [PostController::class, 'like']);
Route::delete('posts/{id}', [PostController::class, 'eliminarPublicacion']);
