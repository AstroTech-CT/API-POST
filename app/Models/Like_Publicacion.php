<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_Publicacion extends Model
{
    use HasFactory;
    
    protected $table = 'Like_Publicacion';


    protected $fillable = ['publicacion_id', 'user_ci'];

    public function publicacion()
    {
        return $this->belongsTo(Post::class, 'publicacion_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

