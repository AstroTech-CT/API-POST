<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Publicacion;
use App\Models\Comentario; 
use App\Models\Like_Publicacion; 
use App\Models\Reporte_Publicacion; 
use App\Models\User; 

class PostController extends Controller
{
    public function VerPublicaciones($tematica){

        try {
            $posts = Publicacion::where('tematica', $tematica)
                ->latest()
                ->take(10)
                ->get();

            return response()->json($posts);
        } catch (\Exception $e) {
            
            return response()->json(['error' => 'Error al traer los post'], 500);
        }
    }

    public function GuardarPublicacion(PostRequest $request){

        try {
            $publicaciones = auth()->user()->publicacion()->create($request->validated());
            return new PostResource($publicaciones);
        } catch (\Exception $e) {
           
            return response()->json(['error' => 'Error guardando la publicacion'], 500);
        }
    }

    public function eliminarPublicacion($id){

        try {
            $post = Publicacion::find($id);

            if (!$post) {
                return response()->json(['message' => 'Publicación no encontrada'], 404);
            }

            $post->delete();

            return response()->json(['message' => 'Publicación eliminada con éxito'], 200);
        } catch (\Exception $e) {
           
            return response()->json(['error' => 'Error al borrar publicacion'], 500);
        }
    }

   
    public function hacerLikeYComentario(Request $request, $postId){
        try {
            DB::raw('LOCK TABLE like_Publicacion WRITE');
            DB::raw('LOCK TABLE comentario WRITE');
            DB::beginTransaction();
    
            $usuarioId = $request->user()->ci; 
    
            $like = new LikePublicacion();
            $like->usuario_id = $usuarioId;
            $like->id_pubicacion = $postId;
            $like->save();
    
            $comentario = new Comentario();
            $comentario->usuario_id = $usuarioId;
            $comentario->id_pubicacion = $postId;
            $comentario->contenido = $request->input('contenido');
            $comentario->save();
    
           
            DB::statement('UNLOCK TABLES');
    
            DB::commit();
    
            return response()->json(['mensaje' => 'Like y comentario realizados con éxito'], 200);
        } catch (\Exception $e) {
            DB::rollback();
    
            return response()->json(['mensaje' => 'Error al realizar like y/o comentario'], 500);
        }
    }
    
    
    

}