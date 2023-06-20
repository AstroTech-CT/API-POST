<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';
    protected $fillable = ['description', 'contenido', 'tematicas', 'user_id']; // Agregar 'tematicas'

    protected $casts = [
        'tematicas' => 'array', // Castear el campo 'tematicas' como array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}




