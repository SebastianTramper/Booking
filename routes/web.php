<?php

use App\Http\Controllers\PackageController;
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

Route::get('/packages', [PackageController::class, 'index'])->name("packages.index");
Route::get('/packages/show/{id}', [PackageController::class, 'show'])->name("packages.show");
Route::get('/packages/create', [PackageController::class, 'create'])->name("packages.create");
Route::post('/packages/store', [PackageController::class, 'store'])->name("packages.store");
Route::get('/packages/edit/{id}', [PackageController::class, 'edit'])->name("packages.edit");
Route::put('/packages/update/{id}', [PackageController::class, 'update'])->name("packages.update");
Route::delete('/packages/delete/{id}', [PackageController::class, 'destroy'])->name("packages.delete");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
