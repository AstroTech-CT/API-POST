<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportePublicacion extends Model
{
    use HasFactory;

    protected $table = 'reporte_publicacion'; 

    protected $fillable = ['Motivo', 'publicacion_id', 'user_ci']; 

   
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'publicacion_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_ci');
    }
}
