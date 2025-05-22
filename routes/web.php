<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JuegoController;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [HomeController::class, 'index'])->name('welcome');

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/sobre_nosotros', [HomeController::class, 'sobre_nosotros'])->name('sobre_nosotros');
Route::get('/hot_new', [HomeController::class, 'hot_new'])->name('hot_new');

Route::post('/categorias', [HomeController::class, 'categorias'])->name('categorias');


Route::get('/contacto', [ContactController::class, 'mostrarFormulario'])->name('contacto.form');
Route::post('/contacto', [ContactController::class, 'enviarFormulario'])->name('contacto.enviar');



Route::post('/contacto/enviar', [ContactController::class, 'enviar'])->name('contacto.enviar');


Route::post('/contacto', [ContactController::class, 'enviar'])->name('contacto.enviar');



Route::get('/test-mail', function() {
    \Illuminate\Support\Facades\Mail::raw('Esto es una prueba', function ($message) {
        $message->to('arturo@verduweb.com')
                ->subject('Prueba de correo');
    });
    return 'Correo enviado';
});
/*
Route::get('/juego/{id}', [JuegoController::class, 'show'])->name('juegos.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/juegos/crear', [JuegoController::class, 'create']);
    Route::post('/admin/juegos', [JuegoController::class, 'store']);
});*/
Route::get('/juego/{id}', [JuegoController::class, 'show'])->name('juegos.show');
Route::get('/juegos/categoria/{categoria}', [JuegoController::class, 'mostrarPorCategoria'])->name('juegos.categoria');
//Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/juegos/crear', [JuegoController::class, 'create'])->name('juegos.create');
    Route::post('/admin/juegos', [JuegoController::class, 'store'])->name('juegos.store');
//});
require __DIR__.'/auth.php';

