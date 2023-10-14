<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider y todas ellas serán
| asignadas al grupo de middleware "web". ¡Haz algo genial!
|
*/


Route::get('/', HomeController::class);

Route::controller(CursoController::class)->group(function () {
    Route::get('cursos', 'index')->name('cursos.index');

    Route::get('cursos/create', 'create')->name('cursos.create');

    //Ruta que se encarga de recibir la información desde el formulario por el método post por seguridad
    Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');


    Route::get('cursos/{curso}', 'show')->name('cursos.show');

    Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');

    //Laravel recomienda usar el método put para hacer actualizaciones.
    Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
});
