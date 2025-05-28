<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade; // Añade esta línea
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Añade el uso correcto de la facade Blade
        Blade::directive('localeName', function ($localeCode) {
            return "<?php echo config('locales.supported.'.$localeCode.'.name') ?? ''; ?>";
        });
    }
}