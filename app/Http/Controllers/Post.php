<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller{ 
    
    public function index(Request $request)
    {
        $tematicas = $request->input('tematicas', []); // Obtener las temáticas enviadas en la solicitud

        $query = Post::with('comments', 'likes')->latest();

        if (!empty($tematicas)) {
            $query->whereIn('tematicas', $tematicas); // Utilizar whereIn para buscar múltiples temáticas
        }

        $posts = $query->paginate(10);
        return PostResource::collection($posts);
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());
        return new PostResource($post);
    }

    public function show(Post $post)
    {
        $post->load('comments', 'likes');
        return new PostResource($post);
    }
}



