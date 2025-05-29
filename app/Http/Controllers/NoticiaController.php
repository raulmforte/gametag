<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\DB; // permite manejar transacciones en la base de datos
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; // facilita la manipulación de archivos


class NoticiaController extends Controller
{
    public function news3()
    {
        $noticias = Noticia::with('usuario')->get(); // obtiene las noticias con información del usuario
        return view('admin.news3', compact('noticias')); // pasa las noticias a la vista 'news3'
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'imagen'      => 'required|image|max:2048', // valida que la imagen sea requerida y tenga un tamaño máximo de 2MB
            'titular'     => 'required|string|max:255', // valida que el titular sea requerido y no exceda 255 caracteres
            'descripcion' => 'required|string', // valida que la descripción sea requerida
        ]);

        DB::beginTransaction(); // inicia una transacción

        try {
            $archivo = $request->file('imagen');
            $nombre = time() . '_' . $archivo->getClientOriginalName(); // genera un nombre único para la imagen
            $rutaDestino = public_path('fotos');

            if (!file_exists($rutaDestino)) {
                mkdir($rutaDestino, 0755, true); // crea la carpeta si no existe
            }

            $archivo->move($rutaDestino, $nombre); // mueve la imagen a la carpeta 'fotos'

            Noticia::create([
                'titular'     => $validated['titular'],
                'descripcion' => $validated['descripcion'],
                'imagen'      => $nombre, // guarda el nombre de la imagen
            ]);

            DB::commit(); // confirma la transacción

            return redirect()->route('noticia.create')->with('status', 'Noticia creada con éxito');
        } catch (\Exception $e) {
            DB::rollBack(); // revierte la transacción en caso de error
            return back()->withErrors(['error' => 'Error al crear la noticia: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $noticia = Noticia::findOrFail($id); // busca la noticia por ID o lanza un error si no se encuentra

            if ($noticia->imagen) {
                $rutaImagen = public_path('fotos/' . $noticia->imagen);
                if (File::exists($rutaImagen)) {
                    File::delete($rutaImagen); // elimina la imagen del disco si existe
                }
            }

            $noticia->delete(); // elimina la noticia de la base de datos

            return redirect()->route('admin.listado_noticias')->with('status', 'Noticia eliminada correctamente');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al eliminar la noticia: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'imagen'      => 'nullable|image|max:2048', // valida que la imagen sea opcional y tenga un tamaño máximo de 2MB
            'titular'     => 'required|string|max:255', // valida que el titular sea requerido y no exceda 255 caracteres
            'descripcion' => 'required|string', // valida que la descripción sea requerida
        ]);

        $noticia = Noticia::findOrFail($id); // busca la noticia por ID o lanza un error si no se encuentra

        DB::beginTransaction(); // inicia una transacción

        try {
            if ($request->hasFile('imagen')) {
                if ($noticia->imagen && file_exists(public_path('fotos/' . $noticia->imagen))) {
                    unlink(public_path('fotos/' . $noticia->imagen)); // elimina la imagen anterior si existe
                }

                $archivo = $request->file('imagen');
                $nombre = time() . '_' . $archivo->getClientOriginalName(); // genera un nombre único para la nueva imagen
                $rutaDestino = public_path('fotos');

                if (!file_exists($rutaDestino)) {
                    mkdir($rutaDestino, 0755, true); // crea la carpeta si no existe
                }

                $archivo->move($rutaDestino, $nombre); // mueve la nueva imagen a la carpeta 'fotos'

                $noticia->imagen = $nombre; // actualiza el nombre de la imagen
            }

            $noticia->titular = $validated['titular'];
            $noticia->descripcion = $validated['descripcion'];

            $noticia->save(); // guarda los cambios en la base de datos

            DB::commit(); // confirma la transacción

            return redirect()->route('news3')->with('status', 'Noticia actualizada con éxito');
        } catch (\Exception $e) {
            DB::rollBack(); // revierte la transacción en caso de error
            return back()->withErrors(['error' => 'Error al actualizar la noticia: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id); // busca la noticia por ID o lanza un error si no se encuentra
        return view('admin.edit_news', compact('noticia')); // pasa la noticia a la vista para editar
    }
}