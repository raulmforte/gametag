<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    // Opcional: especificar los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'titular',
        'descripcion',
        'imagen',
    ];
}
