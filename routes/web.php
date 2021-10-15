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
    return view('auth.login');
});

/*Esta es una forma de llegar al la vista:

Route::get('/paciente', function () {
    return view('paciente.index');
});*/

/* Rutear una vista específica por medio del controlador, en este caso 'create':
Route::get('paciente/create', [App\Http\Controllers\PcpPacienteController::class,'create']); */

Route::resource('paciente', App\Http\Controllers\PcpPacienteController::class)/*Rutea todas las vistas por medio del controlador*/
    ->middleware('auth'); /*indica que o si tiene que estar logeado*/ 

Route::get('paciente_pdf', [App\Http\Controllers\PcpPacienteController::class, 'pdf'])
->name('paciente.pdf');

//Route::get('paciente_pdf',  'App\Http\Controllers\PcpPacienteController@pdf')
//->name('paciente.pdf');
/*Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [App\Http\Controllers\PcpPacienteController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', [App\Http\Controllers\PcpPacienteController::class, 'index'])->name('home');
});
