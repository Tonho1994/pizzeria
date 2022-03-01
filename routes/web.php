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

Route::view('/', 'welcome')->name('inicio');
Route::get('pizza/{id}', [App\Http\Controllers\PizzaController::class, '__invoke'])->name('pizza.show');
Route::resource('pedidos', App\Http\Controllers\PedidoController::class);
Route::get('pedidos', [App\Http\Controllers\PedidoController::class, 'confirm'])->name('pizza.confirm');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
