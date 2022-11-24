<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KurirController;

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

Route::get('/kurir', [KurirController::class, 'index'])->name('kurir');

Route::get('/tambahkurir', [KurirController::class, 'tambahkurir'])->name('tambahkurir');
Route::post('/insertkurir', [KurirController::class, 'insertkurir'])->name('insertkurir');

Route::get('/tampilkankurir/{id}', [KurirController::class, 'tampilkankurir'])->name('tampilkankurir');
Route::post('/updatekurir/{id}', [KurirController::class, 'updatekurir'])->name('updatekurir');
