<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'genero',
        'descripcion',
        'trailer',
        'imagen',
    ];

    public function precios()
    {
        return $this->hasMany(Precio::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function updated_by(){
        return $this->belongsTO(User::class, 'updated_by');

    }
}
