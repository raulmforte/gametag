<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $fillable = [
        'juego_id',
        'plataforma',
        'precio',
        'url_compra',
    ];

    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }
}