<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego; 
use App\Models\Precio; 

class JuegoController extends Controller{
public function store(Request $request)
{/*
    $juego = new Juego();
    $juego->nombre = $request->nombre;
    $juego->genero = $request->genero;
    $juego->descripcion = $request->descripcion;
    $juego->trailer = $request->trailer;

    if ($request->hasFile('imagen')) {
        $ruta = $request->file('imagen')->store('public/imagenes');
        $juego->imagen = basename($ruta);
    }

    $juego->save();

    // Guardar precios
    foreach ($request->plataformas as $index => $plataforma) {
        Precio::create([
            'juego_id' => $juego->id,
            'plataforma' => $plataforma,
            'precio' => $request->precios[$index],
            'url_compra' => $request->urls[$index]
        ]);
    }

    return redirect()->route('juegos.show', $juego->id);*/
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'genero' => 'required|string|max:255',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'trailer' => 'nullable|url',
        'descripcion' => 'nullable|string',
        'plataformas.*' => 'required|string|max:255',
        'precios.*' => 'required|numeric|min:0',
        'urls.*' => 'nullable|url',
    ]);

    // Crear el juego
    $juego = Juego::create([
        'nombre' => $validatedData['nombre'],
        'genero' => $validatedData['genero'],
        'descripcion' => $validatedData['descripcion'],
        'trailer' => $validatedData['trailer'],
    ]);

    // Subir la imagen si existe
    if ($request->hasFile('imagen')) {
        $path = $request->file('imagen')->store('imagenes', 'public');
        $juego->imagen = $path;
        $juego->save();
    }

    // Crear los precios asociados
    foreach ($validatedData['plataformas'] as $index => $plataforma) {
        Precio::create([
            'juego_id' => $juego->id,
            'plataforma' => $plataforma,
            'precio' => $validatedData['precios'][$index],
            'url_compra' => $validatedData['urls'][$index] ?? null,
        ]);
    }

    return redirect()->route('juegos.create')->with('success', 'Juego creado correctamente.');

}
public function show($id)
{
    $juego = Juego::with('precios')->findOrFail($id);
    return view('juegos.show', compact('juego'));
}
public function create()
{
    return view('admin.juegos.create');
}
public function mostrarPorCategoria($categoria)
{
    // Obtener los juegos cuyo género coincida con la categoría
    $juegos = Juego::where('genero', $categoria)->get();

    // Retornar la vista con los juegos
    return view('juegos.categoria', compact('juegos', 'categoria'));
}
}
