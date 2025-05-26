public function handle($request, Closure $next)
{
    $locale = $request->get('lang', config('app.locale')); // Obtiene el idioma de la URL o usa el predeterminado
    App::setLocale($locale);

    return $next($request);
}