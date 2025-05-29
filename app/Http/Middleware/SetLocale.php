<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Get supported locales from config
        $locales = config('app.supported_locales', ['en' => 'English']);
        
        // Get locale from session, URL, or browser
        $locale = $request->segment(1) ?: 
                session('locale') ?: 
                $request->getPreferredLanguage(array_keys($locales));

        // Validate and set locale
        if (array_key_exists($locale, $locales)) {
            app()->setLocale($locale);
            setlocale(LC_ALL, $this->getSystemLocale($locale));
        }

        return $next($request);
    }

    protected function getSystemLocale($locale)
    {
        // Map web locales to system locales
        $map = [
            'es' => 'es_ES.utf8',
            'en' => 'en_US.utf8',
            'fr' => 'fr_FR.utf8',
        ];

        return $map[$locale] ?? 'en_US.utf8';
    }
}