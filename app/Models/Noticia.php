<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    // especifica los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'titular', // titular de la noticia
        'descripcion', // descripción de la noticia
        'imagen', // nombre del archivo de imagen de la noticia
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id'); // relación con el usuario que creó la noticia
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by'); // relación con el usuario que actualizó la noticia
    }
}