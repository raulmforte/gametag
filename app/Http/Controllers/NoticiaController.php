<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
 use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class NoticiaController extends Controller
{
    
    public function news3(){

        $noticias = Noticia::with('usuario')->get();
        return view('admin.news3', compact('noticias'));
    }
   

public function store(Request $request)
{
    // Validación del formulario
    $validated = $request->validate([
        'imagen'      => 'required|image|max:2048',
        'titular'     => 'required|string|max:255',
        'descripcion' => 'required|string',
    ]);

    DB::beginTransaction();

    try {
        // Guardar la imagen en la carpeta /public/fotos
        $archivo = $request->file('imagen');
        $nombre = time() . '_' . $archivo->getClientOriginalName();
        $rutaDestino = public_path('fotos');

        if (!file_exists($rutaDestino)) {
            mkdir($rutaDestino, 0755, true);
        }

        $archivo->move($rutaDestino, $nombre);

        // Crear la noticia incluyendo el nombre de la imagen
        Noticia::create([
            'titular'     => $validated['titular'],
            'descripcion' => $validated['descripcion'],
            'imagen'      => $nombre,
        ]);

        DB::commit();

        return redirect()->route('noticia.create')->with('status', 'Noticia creada con éxito');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Error al crear la noticia: ' . $e->getMessage()]);
    }
}


public function destroy($id)
{
    try {
        $noticia = Noticia::findOrFail($id);

        // Eliminar imagen del sistema de archivos
        if ($noticia->imagen) {
            $rutaImagen = public_path('fotos/' . $noticia->imagen);
            if (File::exists($rutaImagen)) {
                File::delete($rutaImagen);
            }
        }

        // Eliminar la noticia de la base de datos
        $noticia->delete();

        return redirect()->route('admin.listado_noticias')->with('status', 'Noticia eliminada correctamente');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Error al eliminar la noticia: ' . $e->getMessage()]);
    }
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'imagen'      => 'nullable|image|max:2048',  // imagen opcional para actualizar
        'titular'     => 'required|string|max:255',
        'descripcion' => 'required|string',
    ]);

    $noticia = Noticia::findOrFail($id);

    DB::beginTransaction();

    try {
        // Si hay imagen nueva, la guardamos y borramos la vieja
        if ($request->hasFile('imagen')) {
            // Borrar imagen anterior si existe
            if ($noticia->imagen && file_exists(public_path('fotos/' . $noticia->imagen))) {
                unlink(public_path('fotos/' . $noticia->imagen));
            }

            $archivo = $request->file('imagen');
            $nombre = time() . '_' . $archivo->getClientOriginalName();
            $rutaDestino = public_path('fotos');

            if (!file_exists($rutaDestino)) {
                mkdir($rutaDestino, 0755, true);
            }

            $archivo->move($rutaDestino, $nombre);

            $noticia->imagen = $nombre;
        }

        // Actualizar campos restantes
        $noticia->titular = $validated['titular'];
        $noticia->descripcion = $validated['descripcion'];

        $noticia->save();

        DB::commit();

        return redirect()->route('news3')->with('status', 'Noticia actualizada con éxito');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Error al actualizar la noticia: ' . $e->getMessage()]);
    }
}
public function edit($id){
    $noticia = Noticia::findOrFail($id);
    return view('admin.edit_news', compact('noticia'));

}


}
