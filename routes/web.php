<?php

use App\Http\Controllers\TidingsController;
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

Route::get('/', [TidingsController::class, 'index'])->name('tiding.index');
Route::post('/', [TidingsController::class, 'store'])->name('tiding.store');

Route::get('/tidings/view/{slug}', [TidingsController::class, 'show'])->name('tiding.show');
Route::get('/tidings/new', [TidingsController::class, 'new'])->name('tiding.new');
