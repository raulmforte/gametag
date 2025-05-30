<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Precio;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class JuegoController extends Controller {
  
   public function show($id)
    {
        $juego = Juego::with(['precios'])->findOrFail($id); // busca el juego con sus precios asociados

        $juegos = Juego::orderBy('fecha', 'desc')->take(12)->get(); // obtiene los últimos 12 juegos ordenados por fecha
    
        $reviews = Review::where('id_juego', $id)
                ->where('aceptada', 1) // filtra las reviews aceptadas
                ->orderBy('created_at', 'desc') // ordena por fecha de creación descendente
                ->get();

        return view('juegos.show', compact('juego', 'reviews', 'juegos')); // pasa el juego y las reviews a la vista
    }


    public function create()
    {
        return view('admin.juegos.create'); // muestra el formulario para crear un nuevo juego
    }

    public function mostrarPorCategoria($categoria)
    {
        $categoria = str_replace('_', ' ', $categoria); // reemplaza guiones bajos por espacios
        $juegos2 = Juego::where('genero', $categoria)->get(); // obtiene los juegos cuyo género coincide con la categoría
        $juegos = Juego::orderBy('fecha', 'desc')->take(12)->get(); // obtiene los últimos 12 juegos ordenados por fecha


        return view('juegos.categoria', compact('juegos', 'categoria', 'juegos2')); // pasa los juegos y la categoría a la vista
    }



    public function juego(){
        $juegos = Juego::with('usuario')->get(); // obtiene los juegos con información del usuario
        return view('admin.juegos', compact('juegos')); // pasa los juegos a la vista
    }

    public function edit($id){
        $juego = Juego::findOrFail($id); // busca el juego por ID o lanza un error si no se encuentra
        return view('admin.edit_juego', compact('juego')); // pasa el juego a la vista para editar
    }



    public function store(Request $request)
    {
        try {
            Log::info('Datos recibidos del formulario', $request->all()); // registra los datos recibidos

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
                $nombreImagen = Str::uuid().'.'.$file->getClientOriginalExtension(); // genera un nombre único para la imagen
                $file->move(public_path('fotos'), $nombreImagen); // mueve la imagen a la carpeta 'fotos'
            }

            $juego = Juego::create([
                'nombre'      => $request->nombre,
                'genero'      => $request->genero,
                'descripcion' => $request->descripcion,
                'trailer'     => $request->trailer,
                'imagen'      => $nombreImagen,
                'fecha'       => $request->fecha,
                'created_at'  => now(),
            ]);

            Log::info('Juego creado', ['id' => $juego->id]); // registra el ID del juego creado

            $plataformas = $request->input('plataformas');
            $precios     = $request->input('precios');
            $urls        = $request->input('urls', []);

            for ($i = 0; $i < count($plataformas); $i++) {
                if (trim($plataformas[$i]) === '' && trim($precios[$i]) === '') {
                    continue; // omite plataformas y precios vacíos
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
            Log::error('Error al crear juego: '.$e->getMessage(), ['trace'=>$e->getTraceAsString()]); // registra el error
            return back()->withErrors(['error'=>'Ocurrió un error al guardar el juego.'])->withInput();
        }
    }


    public function destroy($id)
    {
        try {
            $juego = Juego::findOrFail($id); // busca el juego o lanza un error si no se encuentra

            if ($juego->imagen) {
                $ruta = public_path('fotos/' . $juego->imagen);
                if (File::exists($ruta)) {
                    File::delete($ruta); // elimina la imagen del disco si existe
                }
            }

            Precio::where('juego_id', $juego->id)->delete(); // elimina los precios asociados

            $juego->delete(); // elimina el juego

            return redirect()
                ->route('juegos')
                ->with('status', 'Juego eliminado correctamente.');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Error al eliminar el juego: ' . $e->getMessage()]); // muestra error si ocurre
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

        $juego = Juego::with('precios')->findOrFail($id); // busca el juego con sus precios asociados

        if ($request->hasFile('imagen')) {
            if ($juego->imagen && File::exists(public_path('fotos/' . $juego->imagen))) {
                File::delete(public_path('fotos/' . $juego->imagen)); // elimina la imagen anterior si existe
            }
            $file = $request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $file->getClientOriginalExtension(); // genera un nombre único para la nueva imagen
            $file->move(public_path('fotos'), $nombreImagen); // mueve la nueva imagen a la carpeta 'fotos'
            $juego->imagen = $nombreImagen;
        }

        $juego->nombre      = $data['nombre'];
        $juego->genero      = $data['genero'];
        $juego->trailer     = $data['trailer'] ?? null;
        $juego->descripcion = $data['descripcion'] ?? null;
        $juego->fecha       = $data['fecha'] ?? null; // actualiza la fecha
        $juego->save();

        $precioIds   = $request->input('precio_ids', []);
        $plataformas = $request->input('plataformas', []);
        $precios     = $request->input('precios', []);
        $urls        = $request->input('urls', []);

        foreach ($precioIds as $index => $precioId) {
            $precio = Precio::findOrFail($precioId); // busca el precio por ID
            $precio->plataforma = $plataformas[$index];
            $precio->precio     = $precios[$index];
            $precio->url_compra = $urls[$index] ?? null;
            $precio->save(); // actualiza el precio
        }

        return redirect()->route('juegos')->with('status', 'Juego actualizado correctamente.');
    }

}