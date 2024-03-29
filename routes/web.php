<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

*/

Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])->name('addresses.destroy');
Route::post('/addresses/search', [AddressController::class, 'search'])->name('addresses.search');


