<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego; 
use App\Models\Precio; 

class JuegoController extends Controller {
    public function store(Request $request)
    {
        try {
            // Validación de los datos enviados en el formulario
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255', // El nombre es obligatorio y debe ser texto
                'genero' => 'required|string|max:255', // El género también es obligatorio
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Imagen opcional con restricciones de formato y tamaño
                'trailer' => 'nullable|url', // El tráiler es opcional, pero debe ser una URL válida
                'descripcion' => 'nullable|string', // Descripción opcional
                'plataformas.*' => 'required|string|max:255', // Cada plataforma es obligatoria
                'precios.*' => 'required|numeric|min:0', // Cada precio debe ser un número mayor o igual a 0
                'urls.*' => 'nullable|url', // Las URLs de compra son opcionales
            ]);
    
            // Crear un nuevo juego y guardar en la base de datos
            $juego = new Juego();
            $juego->nombre = $validatedData['nombre'];
            $juego->genero = $validatedData['genero'];
            $juego->descripcion = $validatedData['descripcion'] ?? null;
            $juego->trailer = $validatedData['trailer'] ?? null;
            $juego->save();
    
            // Verificar que el juego se haya guardado correctamente
            $juegoRefresh = Juego::find($juego->id);
            if (!$juegoRefresh) {
                throw new \Exception("El juego no se persistió en la base de datos");
            }
    
            // Guardar la imagen si se subió
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('imagenes', 'public'); // Guardar en 'storage/app/public/imagenes'
                $juego->imagen = $path;
                $juego->save();
            }
    
            // Guardar los precios asociados al juego
            foreach ($validatedData['plataformas'] as $index => $plataforma) {
                $precio = new Precio();
                $precio->juego_id = $juego->id; // Relacionar el precio con el juego
                $precio->plataforma = $plataforma;
                $precio->precio = $validatedData['precios'][$index];
                $precio->url_compra = $validatedData['urls'][$index] ?? null;
                $precio->save();
    
                // Verificar que el precio se haya guardado correctamente
                if (!Precio::find($precio->id)) {
                    throw new \Exception("Error al guardar precio para plataforma: $plataforma");
                }
            }
    
            // Redirigir al inicio con un mensaje de éxito
            return redirect()->route('welcome')->with('success', '¡Juego creado exitosamente!');
    
        } catch (\Exception $e) {
            // Si ocurre un error, regresar al formulario con los datos ingresados y el mensaje de error
            return back()
                   ->withInput()
                   ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        // Obtener un juego por su ID junto con sus precios relacionados
        $juego = Juego::with('precios')->findOrFail($id);
        return view('juegos.show', compact('juego')); // Pasar el juego a la vista 'juegos.show'
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo juego
        return view('admin.juegos.create');
    }

    public function mostrarPorCategoria($categoria)
    {
        // Obtener los juegos cuyo género coincida con la categoría
        $juegos = Juego::where('genero', $categoria)->get();

        // Retornar la vista con los juegos de esa categoría
        return view('juegos.categoria', compact('juegos', 'categoria'));
    }
}