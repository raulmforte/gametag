protected $middlewareGroups = [
    'web' => [
        // Otros middlewares...
        \App\Http\Middleware\LocalizationMiddleware::class, // agrega el middleware de localización
    ],
];