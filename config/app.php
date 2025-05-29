<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | Este valor es el nombre de tu aplicación, que se utilizará cuando el
    | framework necesite mostrar el nombre de la aplicación en notificaciones
    | u otros elementos de la interfaz de usuario.
    |
    */

    'name' => env('APP_NAME', 'GAMETAG'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | Este valor determina el "entorno" en el que tu aplicación está ejecutándose.
    | Esto puede determinar cómo prefieres configurar varios servicios que utiliza
    | la aplicación. Configúralo en tu archivo ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | Cuando tu aplicación está en modo de depuración, se mostrarán mensajes de
    | error detallados con trazas de pila en cada error que ocurra dentro de tu
    | aplicación. Si está desactivado, se mostrará una página de error genérica.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | Esta URL es utilizada por la consola para generar URLs correctamente cuando
    | se utiliza la herramienta de línea de comandos Artisan. Debes configurarla
    | como la raíz de tu aplicación para que esté disponible dentro de los comandos.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar la zona horaria predeterminada para tu aplicación,
    | que será utilizada por las funciones de fecha y hora de PHP. La zona horaria
    | está configurada como "UTC" por defecto, ya que es adecuada para la mayoría
    | de los casos de uso.
    |
    */

    'timezone' => 'Europe/Madrid',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | La configuración de idioma de la aplicación determina el idioma predeterminado
    | que será utilizado por los métodos de traducción/localización de Laravel.
    | Esta opción puede configurarse para cualquier idioma que planees usar.
    |
    */

    'locale' => 'es', // Idioma predeterminado
    'fallback_locale' => 'en', // Idioma de respaldo
    'supported_locales' => [ // Idiomas soportados
        'en' => 'English',
        'es' => 'Español',
        'fr' => 'Français',
    ],

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | Esta clave es utilizada por los servicios de encriptación de Laravel y debe
    | configurarse como una cadena aleatoria de 32 caracteres para garantizar que
    | todos los valores encriptados sean seguros. Haz esto antes de desplegar la aplicación.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración determinan el controlador utilizado para
    | determinar y gestionar el estado de "modo de mantenimiento" de Laravel.
    | El controlador "cache" permitirá que el modo de mantenimiento se controle
    | en múltiples máquinas.
    |
    | Controladores soportados: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];