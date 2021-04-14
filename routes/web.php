<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarisController;

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
//RUTAS USUARIO
Route::get('/', [UsuarisController::class, 'mostrarLogin']);
Route::post('/login', [UsuarisController::class, 'login'])->name('login');


//RUTA PARA QUE NO SE PUEDA ACCEDER A OTRAS PAGINAS DE LA WEB SIN EL LOGIN
// Route::middleware(['auth'])->group(function () {

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
    ///////////

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
    ///////////

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

    Route::get('/usuaris/crear', function(){
        return view('administrador.crear-user');
    })->name('crearu');
    ///////////

    //RUTA LOGOUT
    Route::get('/logout', [UsuarisController::class, 'logout']);
    ///////////

// });









