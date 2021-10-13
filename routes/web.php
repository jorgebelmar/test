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
    return view('welcome');
});

/*Esta es una forma de llegar al la vista:

Route::get('/paciente', function () {
    return view('paciente.index');
});*/

/* Rutear una vista específica por medio del controlador, en este caso 'create':
Route::get('paciente/create', [App\Http\Controllers\PcpPacienteController::class,'create']); */

Route::resource('paciente', App\Http\Controllers\PcpPacienteController::class); /*Rutea todas las vistas por medio del controlador*/

/*Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
