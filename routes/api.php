<?php

use App\Http\Controllers\API\PostController;

Route::get('posts/{tematica?}', [PostController::class, 'VerPublicaciones']);
Route::post('posts', [PostController::class, 'store']);
Route::post('posts/{id}/comentarios', [PostController::class, 'comentarios']);
Route::post('posts/{id}/like', [PostController::class, 'like']);
Route::delete('posts/{id}', [PostController::class, 'eliminar']);


