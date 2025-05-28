<?php
/*
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas de autenticación sin registro público
Auth::routes(['register' => false]);

Route::middleware(['setlocale'])->group(function () {
Route::get('/', [HomeController::class, 'index'])->name('welcome');
});
// Ruta principal pública
// Ruta dashboard protegida
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Noticias
    Route::get('/admin/news3', [NoticiaController::class, 'news3'])->name('news3');
    Route::get('/admin/news3/insert_news', [AdminController::class, 'insert_news'])->name('admin.insert_news');
    Route::post('noticia', [NoticiaController::class, 'store'])->name('noticia.store');
    Route::delete('/admin/news3/{id}', [NoticiaController::class, 'destroy'])->name('news3.destroy');
    Route::get('/admin/news3/{id}/editar', [NoticiaController::class, 'edit'])->name('news3.edit');
    Route::put('/admin/news3/{id}', [NoticiaController::class, 'update'])->name('news3.update');

    // Juegos
    Route::get('/admin/juegos', [JuegoController::class, 'juego'])->name('juegos');
    Route::get('/admin/juegos/insert_juego', [AdminController::class, 'insert_juego'])->name('admin.insert_juego');
    Route::get('/admin/juegos/{id}/editar', [JuegoController::class, 'edit'])->name('games.edit');
    Route::delete('/admin/juegos/{id}', [JuegoController::class, 'destroy'])->name('games.destroy');
    Route::post('/admin/juegos', [JuegoController::class, 'store'])->name('juegos.store');
    Route::put('/admin/juegos/{id}', [JuegoController::class, 'update'])->name('juegos.update');

    Route::get('/admin/juegos/crear', [JuegoController::class, 'create'])->name('juegos.create');

    // Registro de usuarios — solo accesible si estás logueado
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Usuarios
    Route::get('admin/users', [UserController::class, 'index'])->name('users');
    Route::delete('admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

// Rutas públicas
Route::get('/sobre_nosotros', [HomeController::class, 'sobre_nosotros'])->name('sobre_nosotros');
Route::get('/hot_new', [HomeController::class, 'hot_new'])->name('hot_new');
Route::get('/noticias', [HomeController::class, 'news2'])->name('news2');
Route::get('/noticias/{id}', [HomeController::class, 'news2_mostrar'])->name('news2_mostrar');
Route::post('/categorias', [HomeController::class, 'categorias'])->name('categorias');
Route::get('/contacto', [ContactController::class, 'mostrarFormulario'])->name('contacto.form');
Route::post('/contacto', [ContactController::class, 'enviarFormulario'])->name('contacto.enviar');
Route::post('/contacto/enviar', [ContactController::class, 'enviar'])->name('contacto.enviar');

// Ruta para prueba de correo
Route::get('/test-mail', function() {
    \Illuminate\Support\Facades\Mail::raw('Esto es una prueba', function ($message) {
        $message->to('arturo@verduweb.com')
                ->subject('Prueba de correo');
    });
    return 'Correo enviado';
});

// Rutas de juegos públicas
Route::get('/juego/{id}', [JuegoController::class, 'show'])->name('juegos.show');
Route::get('/juegos/categoria/{categoria}', [JuegoController::class, 'mostrarPorCategoria'])->name('juegos.categoria');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::get('language/{locale}', function ($locale) {
    $supportedLocales = ['en', 'es', 'fr']; // Idiomas soportados
    if (in_array($locale, $supportedLocales)) {
        session()->put('locale', $locale);
        app()->setLocale($locale);
    }
    return redirect()->back();
}) ;
*/

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas de autenticación sin registro público
Auth::routes(['register' => false]);

// Middleware para manejo de idioma global
//Route::middleware(['setlocale'])->group(function () {
    // Ruta principal pública
    Route::get('/', [HomeController::class, 'index'])->name('welcome');
    
    // Rutas públicas
    Route::get('/sobre_nosotros', [HomeController::class, 'sobre_nosotros'])->name('sobre_nosotros');
    Route::get('/hot_new', [HomeController::class, 'hot_new'])->name('hot_new');
    Route::get('/noticias', [HomeController::class, 'news2'])->name('news2');
    Route::get('/noticias/{id}', [HomeController::class, 'news2_mostrar'])->name('news2_mostrar');
    Route::post('/categorias', [HomeController::class, 'categorias'])->name('categorias');
    Route::get('/contacto', [ContactController::class, 'mostrarFormulario'])->name('contacto.form');
    Route::post('/contacto', [ContactController::class, 'enviarFormulario'])->name('contacto.enviar');
    
    // Rutas de juegos públicas
    Route::get('/juego/{id}', [JuegoController::class, 'show'])->name('juegos.show');
    Route::get('/juegos/categoria/{categoria}', [JuegoController::class, 'mostrarPorCategoria'])->name('juegos.categoria');
//});

// Ruta dashboard protegida
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Noticias
    Route::prefix('/admin/news3')->group(function () {
        Route::get('/', [NoticiaController::class, 'news3'])->name('news3');
        Route::get('/insert_news', [AdminController::class, 'insert_news'])->name('admin.insert_news');
        Route::post('/', [NoticiaController::class, 'store'])->name('noticia.store');
        Route::delete('/{id}', [NoticiaController::class, 'destroy'])->name('news3.destroy');
        Route::get('/{id}/editar', [NoticiaController::class, 'edit'])->name('news3.edit');
        Route::put('/{id}', [NoticiaController::class, 'update'])->name('news3.update');
    });

    // Juegos
    Route::prefix('/admin/juegos')->group(function () {
        Route::get('/', [JuegoController::class, 'juego'])->name('juegos');
        Route::get('/insert_juego', [AdminController::class, 'insert_juego'])->name('admin.insert_juego');
        Route::get('/crear', [JuegoController::class, 'create'])->name('juegos.create');
        Route::get('/{id}/editar', [JuegoController::class, 'edit'])->name('games.edit');
        Route::delete('/{id}', [JuegoController::class, 'destroy'])->name('games.destroy');
        Route::post('/', [JuegoController::class, 'store'])->name('juegos.store');
        Route::put('/{id}', [JuegoController::class, 'update'])->name('juegos.update');
    });

    // Registro de usuarios — solo accesible si estás logueado
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Usuarios
    Route::prefix('admin/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});
Route::get('language/{locale}', function ($locale) {
    if (array_key_exists($locale, config('locales.supported'))) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('language.change');
// Ruta para cambio de idioma
/*Route::get('language/{locale}', function ($locale) {
    $supportedLocales = config('app.supported_locales', ['en', 'es', 'fr']);
    
    if (in_array($locale, $supportedLocales)) {
        session()->put('locale', $locale);
        app()->setLocale($locale);
        
        // Solo si necesitas configuración regional del sistema
        if (function_exists('setlocale')) {
            $localeMapping = [
                'en' => 'en_US.utf8',
                'es' => 'es_ES.utf8',
                'fr' => 'fr_FR.utf8'
            ];
            setlocale(LC_ALL, $localeMapping[$locale] ?? config('app.fallback_locale'));
        }
    }
    
    return redirect()->back();
})->name('language.change');*/

// Ruta para prueba de correo (solo desarrollo)
if (app()->environment('local')) {
    Route::get('/test-mail', function() {
        \Illuminate\Support\Facades\Mail::raw('Esto es una prueba', function ($message) {
            $message->to('arturo@verduweb.com')
                    ->subject('Prueba de correo');
        });
        return 'Correo enviado';
    });
}

