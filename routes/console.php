<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Rutas de Consola
|--------------------------------------------------------------------------
|
| Este archivo es donde puedes definir todos tus comandos de consola basados en Closure.
| Cada Closure está vinculado a una instancia de comando, lo que permite un enfoque
| sencillo para interactuar con los métodos de entrada y salida de cada comando.
|
*/


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
