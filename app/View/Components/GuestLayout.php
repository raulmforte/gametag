<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * la vista que se renderiza para el layout de invitado.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
