<?php

use App\Http\Controllers\Master\BarangC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::prefix('master')->group(function () {
    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangC::class, 'index'])->name('master.barang.index');
        Route::get('/create', [BarangC::class, 'create'])->name('master.barang.create');
        Route::post('/store', [BarangC::class, 'store'])->name('master.barang.store');
        Route::get('/show/{id}', [BarangC::class, 'show'])->name('master.barang.show');
        Route::put('/update/{id}', [BarangC::class, 'update'])->name('master.barang.update');
        Route::delete('/destroy/{id}', [BarangC::class, 'destroy'])->name('master.barang.destroy');
    });
});
