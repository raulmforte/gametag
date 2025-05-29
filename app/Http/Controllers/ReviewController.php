<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'nombre_reviewer' => 'required|string|max:100',
            'nota' => 'required|numeric|min:1|max:10',
            'comentario' => 'required|string|max:255',
        ]);

        $review = new Review();
        $review->id_juego = $validated['id_juego'];
        $review->nombre_reviewer = $validated['nombre_reviewer'];
        $review->nota = $validated['nota'];
        $review->comentario = $validated['comentario'];
        $review->aceptada = 0; // Por defecto no aceptada
        $review->save();

        return redirect()->back()->with('success', 'Tu review ha sido enviada y está pendiente de aprobación.');
    }


    public function index()
    {
        $reviews = Review::with('juego')->latest()->get(); // Asumiendo relación con modelo Juego
        return view('admin.reviews', compact('reviews'));
    }

    public function toggleAceptada($id)
    {
        $review = Review::findOrFail($id);
        $review->aceptada = !$review->aceptada;
        $review->save();

        return redirect()->back()->with('status', 'Estado de la review actualizado correctamente.');
    }
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('status', 'Review eliminada correctamente.');
    }
}
