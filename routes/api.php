<?php

use App\Http\Controllers\AsesorioController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\SetpdfController;
use App\Http\Controllers\SolicitudCredito;
use App\Http\Controllers\VehiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/users', function (Request $request) {
        return $request->user();
    });
    // dashboard
    Route::get('/dashboard/resumen',[dashboard::class,'index']);



    // notificaciones 
    Route::get('/clientes/notificaciones',[NotificacionController::class,'index']);
    Route::get('/clientes/alertas',[NotificacionController::class,'alertas']);



    Route::post('/create',[Authcontroller::class,'create']);
    Route::post('/logout',[Authcontroller::class,'logout']);
    Route::get('/permisos',[Authcontroller::class,'permisos']);

    //marcas 
    Route::post('/marca',[MarcasController::class,'create']);
    Route::get('/index',[MarcasController::class,'index']);

    //modelos
    Route::post('/modelo',[ModeloController::class,'create']);
    Route::get('/modelo',[ModeloController::class,'index']);

    //estados
    Route::post('/estados',[EstadoController::class,'create']);
    Route::get('/estados',[EstadoController::class,'index']);
    //creacion de vehiculos con sus fotos
    Route::post('/vehiculos',[VehiculoController::class,'create']);
    Route::get('/vehiculos',[VehiculoController::class,'index']);
    //creacion de clientes
    Route::post('/clientes',[ClienteController::class,'create']);
    Route::get('/clientes',[ClienteController::class,'index']);
    Route::get('/clientes/pendientes',[ClienteController::class,'pendientes']);
    Route::get('/clientes/aprobados',[ClienteController::class,'aprobados']);
    Route::get('/clientes/vendidos',[ClienteController::class,'vendidos']);
    Route::post('/clientes/documentos',[ClienteController::class,'descargasdoc']);
    Route::post('/clientes/estados',[ClienteController::class,'updateEstados']);
    Route::get('/clientes/seguimiento',[ClienteController::class,'seguimiento']);
    Route::get('/clientes/busqueda',[ClienteController::class,'busqueda']);
    // consulta la informacion del cliente
    Route::get('/cliente',[ClienteController::class,'cliente']);


    //todos los usuarios\
    Route::get('/usuarios',[Authcontroller::class,'index']);
    Route::get('/usuarios/permisos',[Authcontroller::class,'users_permisos']);
    Route::post('/usuarios/update_permisos',[Authcontroller::class,'updatePermisos']);
    Route::post('/usuarios/bloqueo',[Authcontroller::class,'BloqueoUser']);
    Route::post('/usuarios/ativacion',[Authcontroller::class,'ActivaUser']);


    //asesorios
    Route::post('/asesorios',[AsesorioController::class,'create']);
    Route::get('/asesorios',[AsesorioController::class,'index']);


    //seguimiento 
    Route::post('/seguimiento/nota',[NotasController::class,'create']);
    Route::get('/seguimiento/nota',[NotasController::class,'index']);

    //resultados
    Route::post('/resultado',[ResultadoController::class,'create']);
    Route::get('/resultado',[ResultadoController::class,'index']);


    //pdfs cotizacion
    Route::post('/setpedf',[SetpdfController::class,'create']);
    Route::get('/setpedf',[SetpdfController::class,'index']);
    Route::get('/setpedf/asesorio',[SetpdfController::class,'asesorios']);
    Route::post('/pdf/descarga',[SetpdfController::class,'dowload']);

    //pdf solicitud de credito
    Route::post('/solicitud/credito',[SolicitudCredito::class,'create']);

});



Route::post('/login',[Authcontroller::class,'login']);
Route::get('/force',[Authcontroller::class,'force']);

Route::get('/imagenes',[ImagenesController::class,'store']);
// Route::get('/imagen',[ImagenesController::class,'store']);

//generar link
Route::get('/link',[ImagenesController::class,'link']);
Route::get('/prueba',[ClienteController::class,'index']);