<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\KendaraanController;

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

// start kurir
Route::get('/kurir', [KurirController::class, 'index'])->name('kurir');

Route::get('/tambahkurir', [KurirController::class, 'tambahkurir'])->name('tambahkurir');
Route::post('/insertkurir', [KurirController::class, 'insertkurir'])->name('insertkurir');

Route::get('/tampilkankurir/{id}', [KurirController::class, 'tampilkankurir'])->name('tampilkankurir');
Route::post('/updatekurir/{id}', [KurirController::class, 'updatekurir'])->name('updatekurir');

Route::get('/deletekurir/{id}', [KurirController::class, 'deletekurir'])->name('deletekurir');
// end kurir

// start kendaraan
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');

Route::get('/tambahkendaraan', [KendaraanController::class, 'tambahkendaraan'])->name('tambahkendaraan');
Route::post('/insertkendaraan', [KendaraanController::class, 'insertkendaraan'])->name('insertkendaraan');

Route::get('/tampilkankendaraan/{id}', [KendaraanController::class, 'tampilkankendaraan'])->name('tampilkankendaraan');
Route::post('/updatekendaraan/{id}', [KendaraanController::class, 'updatekendaraan'])->name('updatekendaraan');

Route::get('/deletekendaraan/{id}', [KendaraanController::class, 'deletekendaraan'])->name('deletekendaraan');
