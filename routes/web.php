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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cons_Tags', [App\Http\Controllers\HomeController::class, 'cons_Tags'])->name('cons_Tags');
Route::post('/crear_Tag', [App\Http\Controllers\HomeController::class, 'crear_Tag'])->name('crear_Tag');
Route::put('/editar_Tag/{id}', [App\Http\Controllers\HomeController::class, 'editar_Tag'])->name('editar_Tag');
Route::delete('/eliminar_Tag/{id}', [App\Http\Controllers\HomeController::class, 'eliminar_Tag'])->name('eliminar_Tag');
