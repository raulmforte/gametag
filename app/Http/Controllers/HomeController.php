<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator; // permite manejar la paginación
use App\Models\Noticia;
use Carbon\Carbon; // facilita el manejo de fechas
use App\Models\Juego;


class HomeController extends Controller
{
    public function __construct()
    {
        // Aquí forzamos la paginación con Bootstrap 5
        Paginator::useBootstrapFive(); // configura la paginación para usar estilos de Bootstrap 5
    }

    public function index()
    {
        $noticias = Noticia::orderBy('created_at', 'desc')->take(8)->get(); // obtiene las últimas 8 noticias ordenadas por fecha de creación

        $juegos = Juego::orderBy('fecha', 'desc')->take(12)->get(); // obtiene los últimos 12 juegos ordenados por fecha

        return view('welcome', compact('noticias', 'juegos')); // pasa las noticias y juegos a la vista 'welcome'
    }

    public function hot_new()
    {
        $noticia = \App\Models\Noticia::orderBy('id', 'desc')->first(); // obtiene la última noticia por ID
        return view('partials.hot_new', compact('noticia')); // pasa la noticia a la vista 'hot_new'
    }

    public function sobre_nosotros()
    {
        return view('partials.about_us'); // devuelve la vista 'about_us'
    }

    public function categorias(Request $request)
    {
        $categoria = $request->input('categoria'); // obtiene la categoría desde la solicitud
        return view('categorias', compact('categoria')); // pasa la categoría a la vista 'categorias'
    }

    public function news2()
    {
        $noticias = Noticia::paginate(9); // paginación de noticias, 9 por página

        $fechaReferencia = Carbon::create(2025, 5, 21, 9, 0, 0); // crea una fecha específica como referencia

        return view('news2', compact('noticias', 'fechaReferencia')); // pasa las noticias y la fecha de referencia a la vista 'news2'
    }

    public function news2_mostrar($id)
    {
        $noticia = Noticia::findOrFail($id); // busca la noticia por ID y lanza un error si no se encuentra

        return view('news2_mostrar', compact('noticia')); // pasa la noticia a la vista 'news2_mostrar'
    }
}