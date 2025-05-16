<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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
