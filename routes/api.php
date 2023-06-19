<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;

Route::get('posts/{topic?}', [PostController::class, 'index']);
Route::apiResource('posts', PostController::class)->except(['index']);

