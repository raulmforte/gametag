<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__)) // configura la aplicación con la ruta base
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // define la ruta para las rutas web
        commands: __DIR__.'/../routes/console.php', // define la ruta para los comandos de consola
        health: '/up', // define la ruta para verificar el estado de la aplicación
    )
    ->withMiddleware(function (Middleware $middleware) {
        // aquí puedes agregar middlewares personalizados
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // aquí puedes manejar excepciones personalizadas
    })->create(); // crea la instancia de la aplicación