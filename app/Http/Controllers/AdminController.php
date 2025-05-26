<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class AdminController extends Controller
{
    public function index(){
        return view('administracion');
    }

    public function insert_news(){
        return view('admin.insert_news');
    }
    public function insert_juego(){
        return view('admin.insert_juego');
    }

}
