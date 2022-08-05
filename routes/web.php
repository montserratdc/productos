<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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

Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/edit', function () {
    return view('empleado.edit');
});

Route::get('/empleado/form', function () {
    return view('empleado.form');
});

// Route::get('/empleado/create',[EmpleadoController::class,'create']);

// Route::get('/empleado',[EmpleadoController::class,'index']);

// Route::get('/empleado/edit',[EmpleadoController::class,'edit']);




Route::resource('empleado', EmpleadoController::class);

