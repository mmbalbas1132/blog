<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Comprobar si la Aplicación Está en Mantenimiento
|--------------------------------------------------------------------------
|
| Si la aplicación está en modo de mantenimiento o demostración mediante el comando "down",
| cargaremos este archivo para que cualquier contenido pre-renderizado se pueda mostrar
| en lugar de iniciar el framework, lo que podría causar una excepción.
|
*/


if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Registrar el Cargador Automático
|--------------------------------------------------------------------------
|
| Composer proporciona un práctico cargador de clases generado automáticamente
| para esta aplicación. ¡Solo tenemos que utilizarlo! Simplemente lo requeriremos
| en el script aquí para que no necesitemos cargar manualmente nuestras clases.
|
*/


require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Ejecutar la Aplicación
|--------------------------------------------------------------------------
|
| Una vez que tenemos la aplicación, podemos manejar la solicitud entrante utilizando
| el kernel HTTP de la aplicación. Luego, enviaremos la respuesta de vuelta
| al navegador de este cliente, permitiéndoles disfrutar de nuestra aplicación.
|
*/


$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
