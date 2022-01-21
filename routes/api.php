<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AudienciasController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ComarcasController;
use App\Http\Controllers\EscritoriosController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\NaturezasController;
use App\Http\Controllers\OcupacoesController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\PerfisController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\TribunaisController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VarasController;

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

Route::group(['middleware' => ['guest:api']], function() {
	Route::post('/login', [AuthController::class, 'login']);	
});

 Route::group(['middleware' => ['auth:api']], function() {
    Route::get('/logout', [AuthController::class, 'logout']); 

    Route::get('/Audiencias', [AudienciasController::class, 'get']); 
    Route::get('/Audiencias/{id}', [AudienciasController::class, 'find']); 
    Route::post('/Audiencias', [AudienciasController::class, 'post']);  
    Route::put('/Audiencias', [AudienciasController::class, 'put']);   
    Route::delete('/Audiencias/{id}', [AudienciasController::class, 'delete']); 

   	Route::get('/cidades', [CidadesController::class, 'get']); 
    Route::get('/cidades/{id}', [CidadesController::class, 'find']); 
    Route::post('/cidades', [CidadesController::class, 'post']); 
    Route::put('/cidades', [CidadesController::class, 'put']);   
    Route::delete('/cidades/{id}', [CidadesController::class, 'delete']); 
    Route::get('/cidades/{id}/where', [CidadesController::class, 'where']); 

    Route::get('/clientes', [ClientesController::class, 'get']); 
    Route::get('/clientes/{id}', [ClientesController::class, 'find']); 
    Route::post('/clientes', [ClientesController::class, 'post']);  
    Route::put('/clientes', [ClientesController::class, 'put']);   
    Route::delete('/clientes/{id}', [ClientesController::class, 'delete']); 

    Route::get('/comarcas', [ComarcasController::class, 'get']); 
    Route::get('/comarcas/{id}', [ComarcasController::class, 'find']); 
    Route::post('/comarcas', [ComarcasController::class, 'post']);  
    Route::put('/comarcas', [ComarcasController::class, 'put']);   
    Route::delete('/comarcas/{id}', [ComarcasController::class, 'delete']); 

    Route::get('/escritorios', [EscritoriosController::class, 'get']); 
    Route::get('/escritorios/{id}', [EscritoriosController::class, 'find']); 
    Route::post('/escritorios', [EscritoriosController::class, 'post']);  
    Route::put('/escritorios', [EscritoriosController::class, 'put']);   
    Route::delete('/escritorios/{id}', [EscritoriosController::class, 'delete']); 

    Route::get('/estados', [EstadosController::class, 'get']); 
    Route::get('/estados/{id}', [EstadosController::class, 'find']); 
    Route::post('/estados', [EstadosController::class, 'post']);  
    Route::put('/estados', [EstadosController::class, 'put']);   
    Route::delete('/estados/{id}', [EstadosController::class, 'delete']); 

    Route::get('/logs', [LogsController::class, 'get']); 
    Route::get('/logs/{id}', [LogsController::class, 'find']); 
    Route::post('/logs', [LogsController::class, 'post']);  
    Route::put('/logs', [LogsController::class, 'put']);   
    Route::delete('/logs/{id}', [LogsController::class, 'delete']);

    Route::get('/naturezas', [NaturezasController::class, 'get']); 
    Route::get('/naturezas/{id}', [NaturezasController::class, 'find']); 
    Route::post('/naturezas', [NaturezasController::class, 'post']);  
    Route::put('/naturezas', [NaturezasController::class, 'put']);   
    Route::delete('/naturezas/{id}', [NaturezasController::class, 'delete']);

    Route::get('/ocupacoes', [OcupacoesController::class, 'get']); 
    Route::get('/ocupacoes/{id}', [OcupacoesController::class, 'find']); 
    Route::post('/ocupacoes', [OcupacoesController::class, 'post']);  
    Route::put('/ocupacoes', [OcupacoesController::class, 'put']);   
    Route::delete('/ocupacoes/{id}', [OcupacoesController::class, 'delete']);

    Route::get('/paises', [PaisesController::class, 'get']); 
    Route::get('/paises/{id}', [PaisesController::class, 'find']); 
    Route::post('/paises', [PaisesController::class, 'post']); 
    Route::put('/paises', [PaisesController::class, 'put']);   
    Route::delete('/paises/{id}', [PaisesController::class, 'delete']); 

    Route::get('/perfis', [PerfisController::class, 'get']); 
    Route::get('/perfis/{id}', [PerfisController::class, 'find']); 
    Route::post('/perfis', [PerfisController::class, 'post']); 
    Route::put('/perfis', [PerfisController::class, 'put']);   
    Route::delete('/perfis/{id}', [PerfisController::class, 'delete']); 

    Route::get('/processos', [ProcessosController::class, 'get']); 
    Route::get('/processos/{id}', [ProcessosController::class, 'find']); 
    Route::post('/processos', [ProcessosController::class, 'post']); 
    Route::put('/processos', [ProcessosController::class, 'put']);   
    Route::delete('/processos/{id}', [ProcessosController::class, 'delete']); 

     Route::get('/tribunais', [TribunaisController::class, 'get']); 
    Route::get('/tribunais/{id}', [TribunaisController::class, 'find']); 
    Route::post('/tribunais', [TribunaisController::class, 'post']); 
    Route::put('/tribunais', [TribunaisController::class, 'put']);   
    Route::delete('/tribunais/{id}', [TribunaisController::class, 'delete']); 
    
    Route::get('/usuarios', [UsuariosController::class, 'get']); 
    Route::get('/usuarios/{id}', [UsuariosController::class, 'find']); 
    Route::post('/usuarios', [UsuariosController::class, 'post']); 
    Route::put('/usuarios', [UsuariosController::class, 'put']);   
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'delete']); 

    Route::get('/varas', [VarasController::class, 'get']); 
    Route::get('/varas/{id}', [VarasController::class, 'find']); 
    Route::post('/varas', [VarasController::class, 'post']); 
    Route::put('/varas', [VarasController::class, 'put']);   
    Route::delete('/varas/{id}', [VarasController::class, 'delete']); 

});
