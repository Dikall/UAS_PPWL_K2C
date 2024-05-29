<?php

use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/pengeluarans', [PengeluaranController::class, 'index'])->name('pengeluarans.index');
Route::get('/pengeluarans/create', [PengeluaranController::class, 'create'])->name('pengeluarans.create');
Route::post('/pengeluarans', [PengeluaranController::class, 'store'])->name('pengeluarans.store');
Route::get('/pengeluarans/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluarans.edit');
Route::put('/pengeluarans/{id}', [PengeluaranController::class, 'update'])->name('pengeluarans.update');
Route::delete('/pengeluarans/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluarans.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
