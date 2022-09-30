<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLShortnerController;
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

Route::get('generateshortlink', [URLShortnerController::class, 'index'])->name('shortlink.index');
Route::post('generateshortlink', [URLShortnerController::class, 'store'])->name('shortlink.store');

Route::get('checklink', [URLShortnerController::class, 'loadCheckPage'])->name('shortlink.loadCheckPage');
Route::post('checklink', [URLShortnerController::class, 'checkLink'])->name('shortlink.check');
