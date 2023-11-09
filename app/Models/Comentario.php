<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'Comentario';

    protected $fillable = ['publicacion_id', 'user_ci', 'contenido'];

    public function publicacion()
    {
        return $this->belongsTo(Post::class, 'publicacion_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
