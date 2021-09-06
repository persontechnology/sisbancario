<?php

use App\Http\Controllers\BancoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//rutas para el banco
Route::get('/bancos',[BancoController::class,'index'])->name('bancos');
Route::get('/nuevo-banco',[BancoController::class,'nuevo'])->name('bancosNuevo');
Route::post('/guardar-banco',[BancoController::class,'guardar'])->name('guardarBanco');
Route::get('/eliminar-banco/{id}',[BancoController::class,'eliminar'])->name('eliminarBanco');
Route::get('/destruir-banco/{id}',[BancoController::class,'destruir'])->name('destruirBanco');
Route::get('/editar-banco/{id}',[BancoController::class,'editar'])->name('editarBanco');
Route::post('/actualizar-banco',[BancoController::class,'actualizar'])->name('actualizarBanco');
Route::get('/listado-clientes-banco/{id}',[BancoController::class,'listadoClientes'])->name('listadoClientesBanco');
// cuentas
Route::get('/cuentas/{idCliente}',[CuentaController::class,'index'])->name('cuenta');
Route::post('/guardar-cuenta',[CuentaController::class,'guardar'])->name('guardarCuenta');

// rutas para clientes
Route::get('/clientes',[ClienteController::class,'index'])->name('clientes');
Route::get('/nuevo-cliente',[ClienteController::class,'nuevo'])->name('clienteNuevo');
Route::post('/guardar-cliente',[ClienteController::class,'guardar'])->name('guardarCliente');

require __DIR__.'/auth.php';
