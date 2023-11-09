<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicacion';
    protected $fillable = ['description', 'contenido', 'tematica', 'user_ci']; 

    protected $casts = [
        'tematica' => 'array', 
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function Like_Publicacion()
    {
        return $this->hasMany(Like_Publicacion::class);
    }

    public function Comentario()
    {
        return $this->hasMany(Comentario::class);
    }
}




