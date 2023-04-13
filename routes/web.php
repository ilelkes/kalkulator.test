<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [InputController::class, 'index']);
Route::get('/inputs', [InputController::class, 'index'])->name('inputs.index');
Route::get('/inputs/nodata', [InputController::class, 'nodata'])->name('inputs.nodata');
Route::get('/inputs/{input}', [InputController::class, 'show'])->name('inputs.show');
