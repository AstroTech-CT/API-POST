<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $tematicaElegida = $request->input('tematica');

        $query = Post::with('comentarios', 'likes')->latest();

        if (!empty($tematicaElegida)) {
            $query->whereHas('tematica', function ($query) use ($tematicaElegida) {
                $query->where('nombre', $tematicaElegida);
            });
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
        $post->load('comentarios', 'likes');
        return new PostResource($post);
    }
}



