<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacultadesController;
use App\Http\Controllers\ProgramasController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MateriasController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Rutas Facultades
Route::get('facultades/listado', [FacultadesController::class, 'index']
)->middleware(['auth', 'verified'])->name('listado.facultades');

Route::get('programas/listado', [ProgramasController::class, 'index']
)->middleware(['auth', 'verified'])->name('listado.programas');

Route::get('docentes/listado', [DocentesController::class, 'index']
)->middleware(['auth', 'verified'])->name('listado.docentes');

Route::get('estudiantes/listado', [EstudiantesController::class, 'index']
)->middleware(['auth', 'verified'])->name('listado.estudiantes');

Route::get('materias/listado', [MateriasController::class, 'index']
)->middleware(['auth', 'verified'])->name('listado.materias');