<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AfectatsController;
use App\Http\Controllers\Api\AlertantsController;
use App\Http\Controllers\Api\ComarquesController;
use App\Http\Controllers\Api\IncidenciesController;
use App\Http\Controllers\Api\MunicipisController;
use App\Http\Controllers\Api\ProvinciesController;
use App\Http\Controllers\Api\RecursosController;
use App\Http\Controllers\Api\RolsController;
use App\Http\Controllers\Api\SexesController;
use App\Http\Controllers\Api\TipusAlertantsController;
use App\Http\Controllers\Api\TipusIncidenciesController;
use App\Http\Controllers\Api\TipusRecursosController;
use App\Http\Controllers\Api\UsuarisController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('afectats', AfectatsController::class);
Route::apiResource('alertants', AlertantsController::class);
Route::apiResource('comarques', ComarquesController::class);
Route::apiResource('incidencies', IncidenciesController::class);
Route::apiResource('municipis', MunicipisController::class);
Route::apiResource('provincies', ProvinciesController::class);
Route::apiResource('recursos', RecursosController::class);
Route::apiResource('rols', RolsController::class);
Route::apiResource('Sexes', SexesController::class);
Route::apiResource('tipusAlertants', TipusAlertantsController::class);
Route::apiResource('tipusIncidencies', TipusIncidenciesController::class);
Route::apiResource('tipusRecursos', TipusRecursosController::class);
Route::apiResource('usuaris', UsuarisController::class);