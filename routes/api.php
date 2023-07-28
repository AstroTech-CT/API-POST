<?php

use App\Http\Controllers\API\PostController;

Route::get('posts', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store']);



