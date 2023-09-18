<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Canales de Difusión
|--------------------------------------------------------------------------
|
| Aquí puedes registrar todos los canales de difusión de eventos que tu
| aplicación soporta. Los callbacks de autorización de canal proporcionados
| se utilizan para verificar si un usuario autenticado puede escuchar el canal.
|
*/


Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
