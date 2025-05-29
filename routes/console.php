<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Define a custom Artisan command to display an inspiring quote
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote()); // Outputs an inspiring quote
})->purpose('Display an inspiring quote'); // Sets the purpose of the command