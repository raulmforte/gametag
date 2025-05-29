<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class JuegoController extends Controller {
    // public function store2(Request $request)
    // {
    //     try {
    //         // Validación de los datos enviados en el formulario
    //         $validatedData = $request->validate([
    //             'nombre' => 'required|string|max:255', // El nombre es obligatorio y debe ser texto
    //             'genero' => 'required|string|max:255', // El género también es obligatorio
    //             'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Imagen opcional con restricciones de formato y tamaño
    //             'trailer' => 'nullable|url', // El tráiler es opcional, pero debe ser una URL válida
    //             'descripcion' => 'nullable|string', // Descripción opcional
    //             'plataformas.*' => 'required|string|max:255', // Cada plataforma es obligatoria
    //             'precios.*' => 'required|numeric|min:0', // Cada precio debe ser un número mayor o igual a 0
    //             'urls.*' => 'nullable|url', // Las URLs de compra son opcionales
    //         ]);
    // 
    //         // Crear un nuevo juego y guardar en la base de datos
    //         $juego = new Juego();
    //         $juego->nombre = $validatedData['nombre'];
    //         $juego->genero = $validatedData['genero'];
    //         $juego->descripcion = $validatedData['descripcion'] ?? null;
    //         $juego->trailer = $validatedData['trailer'] ?? null;
    //         $juego->save();
    // 
    //         // Verificar que el juego se haya guardado correctamente
    //         $juegoRefresh = Juego::find($juego->id);
    //         if (!$juegoRefresh) {
    //             throw new \Exception("El juego no se persistió en la base de datos");
    //         }
    // 
    //         // Guardar la imagen si se subió
    //         if ($request->hasFile('imagen')) {
    //             $path = $request->file('imagen')->store('imagenes', 'public'); // Guardar en 'storage/app/public/imagenes'
    //             $juego->imagen = $path;
    //             $juego->save();
    //         }
    // 
    //         // Guardar los precios asociados al juego
    //         foreach ($validatedData['plataformas'] as $index => $plataforma) {
    //             $precio = new Precio();
    //             $precio->juego_id = $juego->id; // Relacionar el precio con el juego
    //             $precio->plataforma = $plataforma;
    //             $precio->precio = $validatedData['precios'][$index];
    //             $precio->url_compra = $validatedData['urls'][$index] ?? null;
    //             $precio->save();
    // 
    //             // Verificar que el precio se haya guardado correctamente
    //             if (!Precio::find($precio->id)) {
    //                 throw new \Exception("Error al guardar precio para plataforma: $plataforma");
    //             }
    //         }
    // 
    //         // Redirigir al inicio con un mensaje de éxito
    //         return redirect()->route('welcome')->with('success', '¡Juego creado exitosamente!');
    // 
    //     } catch (\Exception $e) {
    //         // Si ocurre un error, regresar al formulario con los datos ingresados y el mensaje de error
    //         return back()
    //                ->withInput()
    //                ->with('error', 'Error: ' . $e->getMessage());
    //     }
    // }
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
        $categoria = str_replace('_', ' ', $categoria);
        // Obtener los juegos cuyo género coincida con la categoría
        $juegos = Juego::where('genero', $categoria)->get();

        // Retornar la vista con los juegos de esa categoría
        return view('juegos.categoria', compact('juegos', 'categoria'));
    }



    public function juego(){
        $juegos = Juego::with('usuario')->get();
        return view('admin.juegos', compact('juegos'));
    }

    public function edit($id){
    $juego = Juego::findOrFail($id);
    return view('admin.edit_juego', compact('juego'));

}



public function store(Request $request)
{
    try {
        Log::info('Datos recibidos del formulario', $request->all());

        $request->validate([
            'nombre'        => 'required|string|max:255',
            'genero'        => 'required|string|max:255',
            'imagen'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'trailer'       => 'nullable|url|max:255',
            'descripcion'   => 'nullable|string',
            'fecha'         => 'nullable|date',
            'plataformas.*' => 'required|string|max:255',
            'precios.*'     => 'required|numeric',
            'urls.*'        => 'nullable|string|max:255',
        ]);

        $nombreImagen = null;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('fotos'), $nombreImagen);
        }

        $juego = Juego::create([
            'nombre'      => $request->nombre,
            'genero'      => $request->genero,
            'descripcion' => $request->descripcion,
            'trailer'     => $request->trailer,
            'imagen'      => $nombreImagen,
            'fecha'       => $request->fecha,  // Aquí se guarda la fecha
            'created_at'  => now(),
        ]);

        Log::info('Juego creado', ['id' => $juego->id]);

        $plataformas = $request->input('plataformas');
        $precios     = $request->input('precios');
        $urls        = $request->input('urls', []);

        for ($i = 0; $i < count($plataformas); $i++) {
            if (trim($plataformas[$i]) === '' && trim($precios[$i]) === '') {
                continue;
            }
            Precio::create([
                'juego_id'   => $juego->id,
                'plataforma' => $plataformas[$i],
                'precio'     => $precios[$i],
                'url_compra' => $urls[$i] ?? null,
            ]);
        }

        return redirect()->route('juegos')->with('status', 'Juego creado correctamente.');
    } catch (\Exception $e) {
        Log::error('Error al crear juego: '.$e->getMessage(), ['trace'=>$e->getTraceAsString()]);
        return back()->withErrors(['error'=>'Ocurrió un error al guardar el juego.'])->withInput();
    }
}


public function destroy($id)
{
    try {
        // Busca el juego o falla con 404
        $juego = Juego::findOrFail($id);

        // Elimina la imagen del disco si existe
        if ($juego->imagen) {
            $ruta = public_path('fotos/' . $juego->imagen);
            if (File::exists($ruta)) {
                File::delete($ruta);
            }
        }

        // Elimina los precios asociados (si no tienes ON DELETE CASCADE)
        Precio::where('juego_id', $juego->id)->delete();

        // Borra el juego
        $juego->delete();

        // Redirige a la lista con mensaje de éxito
        return redirect()
            ->route('juegos')
            ->with('status', 'Juego eliminado correctamente.');
    } catch (\Exception $e) {
        // En caso de error, vuelve con mensaje
        return back()
            ->withErrors(['error' => 'Error al eliminar el juego: ' . $e->getMessage()]);
    }
}


public function update(Request $request, $id)
{
    $data = $request->validate([
        'nombre'        => 'required|string|max:255',
        'genero'        => 'required|string|max:255',
        'imagen'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'trailer'       => 'nullable|url|max:255',
        'descripcion'   => 'nullable|string',
        'fecha'         => 'nullable|date',
        'precio_ids.*'  => 'required|integer|exists:precios,id',
        'plataformas.*' => 'required|string|max:255',
        'precios.*'     => 'required|numeric|min:0',
        'urls.*'        => 'nullable|string|max:255',
    ]);

    $juego = Juego::with('precios')->findOrFail($id);

    if ($request->hasFile('imagen')) {
        if ($juego->imagen && File::exists(public_path('fotos/' . $juego->imagen))) {
            File::delete(public_path('fotos/' . $juego->imagen));
        }
        $file = $request->file('imagen');
        $nombreImagen = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('fotos'), $nombreImagen);
        $juego->imagen = $nombreImagen;
    }

    $juego->nombre      = $data['nombre'];
    $juego->genero      = $data['genero'];
    $juego->trailer     = $data['trailer'] ?? null;
    $juego->descripcion = $data['descripcion'] ?? null;
    $juego->fecha       = $data['fecha'] ?? null; // ← Aquí se actualiza la fecha
    $juego->save();

    $precioIds   = $request->input('precio_ids', []);
    $plataformas = $request->input('plataformas', []);
    $precios     = $request->input('precios', []);
    $urls        = $request->input('urls', []);

    foreach ($precioIds as $index => $precioId) {
        $precio = Precio::findOrFail($precioId);
        $precio->plataforma = $plataformas[$index];
        $precio->precio     = $precios[$index];
        $precio->url_compra = $urls[$index] ?? null;
        $precio->save();
    }

    return redirect()->route('juegos')->with('status', 'Juego actualizado correctamente.');
}

}
