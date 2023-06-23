<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarcodeController;

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
    // return view('welcome');
    return redirect('login');
});

Route::get('time', function () {
    echo now();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('datatable/{show}', [App\Http\Controllers\HomeController::class, 'loadTable']);
Route::post('clockin', [App\Http\Controllers\HomeController::class, 'clockin'])->middleware('auth')->name('clockin');

Route::get('barcode', [App\Http\Controllers\BarcodeController::class, 'index'])->name('home');
