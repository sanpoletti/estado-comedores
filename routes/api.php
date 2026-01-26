<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoComedoresController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')
    ->middleware('api.basic')
    ->group(function () {
        Route::get('estado-comedores', [EstadoComedoresController::class, 'show']);
    });

Route::get('/phpinfo', function () {
    phpinfo();
});
