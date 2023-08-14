<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller{

    public function VerPublicaciones($tematica)
    {
        $posts = Post::where('tematica', $tematica)
            ->latest()
            ->take(10)
            ->get();
    
        return response()->json($posts);
    }

    public function GuardarPublicacion(PostRequest $request){

        $publicaciones = auth()->user()->publicaciones()->create($request->validated());
        return new PostResource($publicaciones);
    }

    public function Hacercomentario($id){

        $validatedData = $request->validate([
            'contenido' => 'required|string|max:255', ]);

        $comentario = new Comentario(); 
        $comentario->user_ci = auth()->id();
        $comentario->publicaciones_id = $id; 
        $comentario->contenido = $validatedData['contenido']; 
        $comentario->save();

        return response()->json(['message' => 'Comentario creado con éxito'], 201);
    }

    public function Hacerlike($id) {

        $publicaciones = Post::find($id);

        if (!$publicaciones) {
            return response()->json(['message' => 'Publicación no encontrada'], 404);
        }

        auth()->user()->likes()->toggle($publicaciones);
        return response()->json(['message' => 'Like actualizado con éxito'], 200);
    }

    public function eliminarPublicacion($id){

        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Publicación no encontrada'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Publicación eliminada con éxito'], 200);
    }
}

