<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Puedes agregar un middleware aquí si lo necesitas
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $catalogos = new Collection([
            1 => [
                'filename' => 'catalogo_tecnico_2025',
                'name' => 'Catálogo Técnico 2025'
            ],
            2 => [
                'filename' => 'TAPICERIA2023_G01',
                'name' => 'Tapicería 2024 Grupo 1'
            ],
            3 => [
                'filename' => 'tapiceria_2024',
                'name' => 'Tapicería 2023'
            ],
            4 => [
                'filename' => 'Folleto_manivelas',
                'name' => 'Folleto de Manivelas'
            ],
            5 => [
                'filename' => 'ProteccionLaboral_23',
                'name' => 'Protección Laboral 20.23'
            ],
            6 => [
                'filename' => 'catalogo_mesa',
                'name' => 'Mesa 20.23'
            ],
            7 => [
                'filename' => 'Tiradores_2022',
                'name' => 'Tiradores 20.22'
            ],
            8 => [
                'filename' => 'alk_2020_english',
                'name' => 'ALK | Furniture fittings 2021'
            ],
            9 => [
                'filename' => 'general_2_20',
                'name' => 'General 20.20'
            ],
            10 => [
                'filename' => 'grupo_1',
                'name' => 'Cierres 20.20'
            ],
            11 => [
                'filename' => 'grupo_2',
                'name' => 'Bisagras 20.20'
            ],
            12 => [
                'filename' => 'grupo_3',
                'name' => 'Unión 20.20'
            ],
            13 => [
                'filename' => 'grupo_4',
                'name' => 'Tornillería 20.20'
            ],
            14 => [
                'filename' => 'grupo_5',
                'name' => 'Interior muebles 20.20'
            ],
            15 => [
                'filename' => 'grupo_6',
                'name' => 'Guías y patas 20.20'
            ],
            16 => [
                'filename' => 'grupo_7',
                'name' => 'Sistemas correderos 20.20'
            ],
            17 => [
                'filename' => 'grupo_8',
                'name' => 'Ruedas y patas 20.20'
            ],
            18 => [
                'filename' => 'grupo_9',
                'name' => 'Iluminación'
            ],
            19 => [
                'filename' => 'grupo_10',
                'name' => 'Cocinas'
            ],
            20 => [
                'filename' => 'carpinteria_2_18',
                'name' => 'Carpintería 2.18'
            ]
        ]);

        $revistas = array(
            'SectorV_e5',
            'SectorV_e4',
            'SectorV_e3',
            'SectorV_e2',
            'SectorV_e1'
        );

        return view('welcome', compact('catalogos', 'revistas'));
    }

    public function hot_new(){

        return view('partials.hot_new');

    }

    public function sobre_nosotros(){

        return view('partials.about_us');
    }

    public function categorias(Request $request){

        $categoria = $request->input('categoria');

        return view('categorias', compact('categoria'));
    }
}
