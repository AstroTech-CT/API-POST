<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index($topic = null)
    {
        $query = Post::with('comments', 'likes')->latest();

        if ($topic) {
            $query->where('tematica', $topic);
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


