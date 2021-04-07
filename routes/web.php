<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('usuari.login');
});
//RUTAS RECURSOS
Route::get('/consultar', function () {
    return view('recursos.consultar');
});

Route::get('/principal_recursos', function () {
    return view('recursos.principal');
});

Route::get('/asignat_editar', function () {
    return view('recursos.asignat_editar');
});
//RUTAS ADMINISTRATIVO
Route::get('/incidencies', function () {
    return view('administratiu.mostrar_incidencias');
});

Route::get('/incidencies_detallada', function () {
    return view('administratiu.incidencia_detallada');
});

Route::get('/principal_administratiu', function () {
    return view('administratiu.principal');
})->name('administrativo_principal');

Route::get('/trucada', function () {
    return view('administratiu.gestionar_trucada');
});

//RUTAS ADMINISTRADOR
Route::get('/principal_administrador', function () {
    return view('administrador.principal');
});

Route::get('/usuaris', function () {
    return view('administrador.usuaris_rols');
});

Route::get('/incidencies_editar', function () {
    return view('administrador.incidencies_editar');
});

Route::get('/alertant', function () {
    return view('administrador.alertant');
});

Route::get('/alertant_detall', function () {
    return view('administrador.alertant_detall');
});
