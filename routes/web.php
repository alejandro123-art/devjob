<?php

use App\Http\Controllers\candidato_controller;
use App\Http\Controllers\home_controller;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\vacante_controller;
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

Route::get('/', home_controller::class)->name('home');

Route::get('/dashboard', [vacante_controller::class, 'index'])->middleware(['auth','verified','rol.reclutador'])->name('vacantes.index');

Route::get('vacantes/create', [vacante_controller::class, 'create'])->middleware(['auth','verified'])->name('vacantes.create');
Route::get('vacantes/{vacante}/edit', [vacante_controller::class, 'edit'])->middleware(['auth','verified'])->name('vacantes.edit');
Route::get('vacantes/{vacante}', [vacante_controller::class, 'show'])->name('vacantes.show');
Route::get('/candidatos/{vacante}',[candidato_controller::class, 'index'])->name('candidatos.index');
//ruta notificacion
route::get('/notificaciones',NotificacionController::class)->middleware(['auth','verified','rol.reclutador'])->name('notificaciones');
require __DIR__.'/auth.php';
