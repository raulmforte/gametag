<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * la vista que se renderiza para el layout de la aplicación.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
