<?php

use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('welcome'); });

Route::get('/dashboard', function () {return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//--------------------- Cities Routers  -----------------------------------------
Route::get('/Cities', [CitiesController::class, 'index'])->name('ListCities');
Route::post('/Cities', [CitiesController::class, 'store'])->name('Cities.store');
Route::get('/Cities/Add', [CitiesController::class, 'create'])->name('CitiesCreate');

Route::get('/CitiesEdit/{id}', [CitiesController::class, 'edit'])->name('CitiesEdit');
Route::put('/CitiesUpdate/{id}', [CitiesController::class, 'update'])->name('CitiesUpdate');

Route::delete('/CitiesDestroy/{id}', [CitiesController::class, 'destroy'])->name('CitiesDestroy');
//------------------------------------------------------------------------------
//--------------------- Types Routers  -----------------------------------------
Route::get('/Types', [TypeController::class, 'index'])->name('ListTypes');
Route::post('/Types', [TypeController::class, 'store'])->name('Typesstore');
Route::get('/Types/Add', [TypeController::class, 'create'])->name('TypesCreate');

Route::get('/TypesEdit/{id}', [TypeController::class, 'edit'])->name('TypesEdit');
Route::put('/TypesUpdate/{id}', [TypeController::class, 'update'])->name('TypesUpdate');

Route::delete('/TypesDestroy/{id}', [TypeController::class, 'destroy'])->name('TypesDestroy');
//------------------------------------------------------------------------------



require __DIR__ . '/auth.php';