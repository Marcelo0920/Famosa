<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PesoController;
use App\Http\Controllers\ProductoController;

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
    return view('home.index');
});

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::resource('administrador',AdministradorController::class)->middleware('auth');

Route::resource('empleado',EmpleadoController::class)->middleware('auth');

Route::resource('cliente',ClienteController::class)->middleware('auth');

Route::resource('tipo',TipoController::class)->middleware('auth');

Route::resource('categoria',CategoriaController::class)->middleware('auth');

Route::resource('peso', PesoController::class)->middleware('auth');

Route::resource('producto', ProductoController::class)->middleware('auth');