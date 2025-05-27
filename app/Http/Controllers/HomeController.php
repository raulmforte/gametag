<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Noticia;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        // Aquí forzamos la paginación con Bootstrap 5
        Paginator::useBootstrapFive();
    }

    public function index()
{
    $noticias = Noticia::orderBy('created_at', 'desc')->take(8)->get();

    $juegos = \App\Models\Juego::orderBy('created_at', 'desc')->take(12)->get();

    return view('welcome', compact('noticias', 'juegos'));
}

    public function hot_new()
    {
        $juego = \App\Models\Juego::orderBy('id', 'desc')->first();
        return view('partials.hot_new', compact('juego'));
    }

    public function sobre_nosotros()
    {
        return view('partials.about_us');
    }

    public function categorias(Request $request)
    {
        $categoria = $request->input('categoria');
        return view('categorias', compact('categoria'));
    }

    public function news2(){
        $noticias = Noticia::paginate(9);

        $fechaReferencia = Carbon::create(2025, 5, 21, 9, 0, 0);

        return view('news2', compact('noticias', 'fechaReferencia'));
    }

    public function news2_mostrar($id)
    {
        // Cargamos la relación plural 'imagenes' tal y como la iteras en la vista
        $noticia = Noticia::findOrFail($id);

        return view('news2_mostrar', compact('noticia'));
    }
}