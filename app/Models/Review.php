<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review'; // 👈 Aquí le dices que use la tabla 'review'

    protected $fillable = [
        'id_juego', 'nombre_reviewer', 'nota', 'comentario', 'aceptada',
    ];

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juego');
    }
}
