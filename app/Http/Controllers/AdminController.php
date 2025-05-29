<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class AdminController extends Controller
{
    public function index(){
        return view('administracion'); // devuelve la vista de la administración
    }

    public function insert_news(){
        return view('admin.insert_news'); // devuelve la vista para insertar noticias
    }
    public function insert_juego(){
        return view('admin.insert_juego'); // devuelve la vista para insertar juegos
    }

}