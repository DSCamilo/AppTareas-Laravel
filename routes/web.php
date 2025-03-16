<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoriesController;


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

Route::get('/tareas', function () {
    return view('tareas.index');
});

Route::get('/tareas', [TareasController::class, 'index'])->name('todos');

Route::post('/tareas', [TareasController::class, 'store'])->name('todos');

Route::get('/tareas/{id}', [TareasController::class, 'show'])->name('tareas-edit');
Route::patch('/tareas/{id}', [TareasController::class, 'update'])->name('tareas-update');
Route::delete('/tareas/{id}', [TareasController::class, 'destroy'])->name('tareas-destroy');

Route::resource('categories', CategoriesController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
