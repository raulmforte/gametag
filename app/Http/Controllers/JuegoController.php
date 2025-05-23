<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego; 
use App\Models\Precio; 

class JuegoController extends Controller{
    /*public function store(Request $request)
    {
        dd($request->all());
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'genero' => 'required|string|max:255',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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
                'descripcion' => $validatedData['descripcion'] ?? null,
                'trailer' => $validatedData['trailer'] ?? null,
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
    
            return redirect()->route('welcome')->with('success', 'Juego creado correctamente!');
        } catch (\Exception $e) {
            return redirect()->route('welcome')->with('error', 'Error al crear el juego: ' . $e->getMessage());
        }
    }*/
    public function store(Request $request)
    {
        try {
            // Validación
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'genero' => 'required|string|max:255',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'trailer' => 'nullable|url',
                'descripcion' => 'nullable|string',
                'plataformas.*' => 'required|string|max:255',
                'precios.*' => 'required|numeric|min:0',
                'urls.*' => 'nullable|url',
            ]);
    
            // Crear juego con save() en lugar de create()
            $juego = new Juego();
            $juego->nombre = $validatedData['nombre'];
            $juego->genero = $validatedData['genero'];
            $juego->descripcion = $validatedData['descripcion'] ?? null;
            $juego->trailer = $validatedData['trailer'] ?? null;
            $juego->save();
    
            // Verificación inmediata en la base de datos
            $juegoRefresh = Juego::find($juego->id);
            if (!$juegoRefresh) {
                throw new \Exception("El juego no se persistió en la base de datos");
            }
    
            // Imagen
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('imagenes', 'public');
                $juego->imagen = $path;
                $juego->save();
            }
    
            // Precios
            foreach ($validatedData['plataformas'] as $index => $plataforma) {
                $precio = new Precio();
                $precio->juego_id = $juego->id;
                $precio->plataforma = $plataforma;
                $precio->precio = $validatedData['precios'][$index];
                $precio->url_compra = $validatedData['urls'][$index] ?? null;
                $precio->save();
    
                // Verificación de precio
                if (!Precio::find($precio->id)) {
                    throw new \Exception("Error al guardar precio para plataforma: $plataforma");
                }
            }
    
            return redirect()->route('welcome')->with('success', '¡Juego creado exitosamente!');
    
        } catch (\Exception $e) {
            return back()
                   ->withInput()
                   ->with('error', 'Error: ' . $e->getMessage());
        }
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
