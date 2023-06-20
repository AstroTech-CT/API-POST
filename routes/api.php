<?php

use App\Http\Controllers\API\PostController;

Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController::class, 'store']);
Route::get('posts/{post}', [PostController::class, 'show']);


