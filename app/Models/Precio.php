<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'juego_id', // id del juego asociado
        'plataforma', // plataforma donde está disponible el juego
        'precio', // precio del juego
        'url_compra', // enlace para comprar el juego
    ];

    // Relación con el modelo Juego
    public function juego()
    {
        return $this->belongsTo(Juego::class); // relación con el modelo Juego
    }
}