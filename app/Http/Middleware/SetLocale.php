public function handle($request, Closure $next)
{
    $locale = session('locale', config('app.fallback_locale'));
    
    if (array_key_exists($locale, config('locales.supported'))) {
        app()->setLocale($locale);
        
        // Configuración regional del sistema
        setlocale(LC_ALL, config("locales.supported.$locale.php"));
    }
    
    return $next($request);
}