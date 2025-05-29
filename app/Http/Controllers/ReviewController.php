<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_juego' => 'required|exists:juegos,id', // valida que el id del juego exista en la tabla juegos
            'nombre_reviewer' => 'required|string|max:100', // valida que el nombre del reviewer sea requerido y no exceda 100 caracteres
            'nota' => 'required|numeric|min:1|max:10', // valida que la nota sea un número entre 1 y 10
            'comentario' => 'required|string|max:255', // valida que el comentario sea requerido y no exceda 255 caracteres
        ]);

        $review = new Review();
        $review->id_juego = $validated['id_juego']; // asigna el id del juego a la review
        $review->nombre_reviewer = $validated['nombre_reviewer']; // asigna el nombre del reviewer
        $review->nota = $validated['nota']; // asigna la nota
        $review->comentario = $validated['comentario']; // asigna el comentario
        $review->aceptada = 0; // por defecto no aceptada
        $review->save(); // guarda la review en la base de datos

        return redirect()->back()->with('success', 'Tu review ha sido enviada y está pendiente de aprobación.'); // redirige con mensaje de éxito
    }


    public function index()
    {
        $reviews = Review::with('juego')->latest()->get(); // obtiene las reviews más recientes con relación al modelo Juego
        return view('admin.reviews', compact('reviews')); // pasa las reviews a la vista 'admin.reviews'
    }

    public function toggleAceptada($id)
    {
        $review = Review::findOrFail($id); // busca la review por ID o lanza un error si no se encuentra
        $review->aceptada = !$review->aceptada; // alterna el estado de aceptación
        $review->save(); // guarda los cambios en la base de datos

        return redirect()->back()->with('status', 'Estado de la review actualizado correctamente.'); // redirige con mensaje de éxito
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id); // busca la review por ID o lanza un error si no se encuentra
        $review->delete(); // elimina la review de la base de datos

        return redirect()->route('admin.reviews.index')->with('status', 'Review eliminada correctamente.'); // redirige con mensaje de éxito
    }
}