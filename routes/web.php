<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;



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

// Los métodos que uso index, create, store, show, edit y update los creo y defino en el controlador CursoController

Route::get('/', HomeController::class)->name('home');

Route::view('nosotros', 'nosotros')->name('nosotros');

Route::controller(CursoController::class)->group(function () {
    Route::get('cursos', 'index')->name('cursos.index');


    Route::get('cursos/create', 'create')->name('cursos.create');

    //Ruta que se encarga de recibir la información desde el formulario por el método POST por seguridad
    Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');

    //Ruta que se encarga de mostrar la información de cada curso.
    Route::get('cursos/{curso}', 'show')->name('cursos.show');

    //Ruta que se encarga de editar la información de cada curso
    Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');

    //Laravel recomienda usar el método put para hacer actualizaciones.
    Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');

    //Laravel recomienda usar el método delete para eliminar registros de labase de datos. el método para procesar por convención se llama destroy.
    Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

    // explicación valida para todos
    // [CursoController::class, 'destroy']: Aquí se especifica el controlador y el método que se ejecutarán cuando se acceda a esta ruta. En este caso, cuando la solicitud DELETE se haga a la URL "/cursos/{curso}", Laravel llamará al método destroy del controlador CursoController para manejar la solicitud de eliminación.
});


Route::get('contactanos', function () {
    Mail::to('mmbalbas@dawlugo.es')->send(new ContactanosMailable);

    return 'Mensaje enviado';

})->name('contactanos');
