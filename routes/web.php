<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\CetakArrayController;

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
    return redirect('transaksi');
});

Route::resource('transaksi/', TransactionsController::class);
Route::resource('cetak/', CetakArrayController::class);
Route::get('query', [CetakArrayController::class, 'query'])->name('query');

// delete
Route::delete('transaksi/delete/{id}', [TransactionsController::class, 'destroy'])->name('transaksi.delete');

// edit
Route::put('transaksi/edit/{id}', [TransactionsController::class, 'update'])->name('transaksi.edit');

Route::get('transaksi/detail/{id}', [TransactionsController::class, 'show'])->name('transaksi.detail');




