<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckLocales extends Command
{
    protected $signature = 'locales:check';
    protected $description = 'Verifica los locales instalados en el sistema';

    public function handle()
    {
        $this->info('Verificando locales disponibles...');
        $this->newLine();
        
        foreach (config('locales.supported') as $code => $locale) {
            $result = setlocale(LC_ALL, $locale['php']);
            $available = $result !== false;
            
            $this->line("Locale: <fg=blue>{$locale['name']}</>");
            $this->line("Código: <fg=yellow>{$code}</>");
            $this->line("Config PHP: <fg=yellow>{$locale['php']}</>");
            $this->line("Disponible: " . ($available ? '<fg=green>✔</>' : '<fg=red>✖</>'));
            
            if ($available) {
                $this->line("Resultado: <fg=green>{$result}</>");
            }
            
            $this->newLine();
        }
    }
}