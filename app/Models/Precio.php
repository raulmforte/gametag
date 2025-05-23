<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'juego_id',
        'plataforma',
        'precio',
        'url_compra',
    ];

    // Relación con el modelo Juego
    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }
}