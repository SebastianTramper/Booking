<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TimeslotController;
use App\Models\Package;
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


Route::get('/', [HomeController::class, 'index'])->name("home.index");


Route::get('/packages/show/{id}', [PackageController::class, 'show'])->name("packages.show");
Route::get('/packages', [PackageController::class, 'index'])->name("packages.index")->middleware("admin");
Route::get('/packages/create', [PackageController::class, 'create'])->name("packages.create")->middleware("admin");
Route::post('/packages/store', [PackageController::class, 'store'])->name("packages.store")->middleware("admin");
Route::get('/packages/edit/{id}', [PackageController::class, 'edit'])->name("packages.edit")->middleware("admin");
Route::put('/packages/update/{id}', [PackageController::class, 'update'])->name("packages.update")->middleware("admin");
Route::delete('/packages/delete/{id}', [PackageController::class, 'destroy'])->name("packages.delete")->middleware("admin");

Route::get('/timeslots/index/{package}', [TimeslotController::class, 'index'])->name("timeslots.index")->middleware("admin");
Route::get('/timeslots/create/{package}', [TimeslotController::class, 'create'])->name("timeslots.create")->middleware("admin");
Route::post('/timeslots/store/{package}', [TimeslotController::class, 'store'])->name("timeslots.store")->middleware("admin");
Route::get('/timeslots/show/{timeslot}', [TimeslotController::class, 'show'])->name("timeslots.show")->middleware("admin");
Route::get('/timeslots/edit/{timeslot}', [TimeslotController::class, 'edit'])->name("timeslots.edit")->middleware("admin");
Route::put('/timeslots/update/{timeslot}', [TimeslotController::class, 'update'])->name("timeslots.update")->middleware("admin");
Route::delete('/timeslots/delete/{timeslot}', [TimeslotController::class, 'destroy'])->name("timeslots.delete")->middleware("admin");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';
