<?php

/*
|--------------------------------------------------------------------------
| Crear la Aplicación
|--------------------------------------------------------------------------
|
| Lo primero que haremos es crear una nueva instancia de la aplicación Laravel,
| que sirve como el "pegamento" para todos los componentes de Laravel y es
| el contenedor IoC (Inversión de Control) para el sistema que vincula todas las
| diversas partes.
|
*/


$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Vincular Interfaces Importantes
|--------------------------------------------------------------------------
|
| A continuación, debemos vincular algunas interfaces importantes en el contenedor
| para que podamos resolverlas cuando sea necesario. Los kernels atienden
| las solicitudes entrantes a esta aplicación tanto desde la web como desde la CLI.
|
*/


$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Devolver la Aplicación
|--------------------------------------------------------------------------
|
| Este script devuelve la instancia de la aplicación. La instancia se proporciona
| al script que la llama, de modo que podamos separar la creación de las instancias
| de la ejecución real de la aplicación y el envío de respuestas.
|
*/


return $app;
