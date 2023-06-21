<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembroController;

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

Route::get('/membros', [MembroController::class, 'index'])->name('membros.index');
Route::get('/membros/create', [MembroController::class, 'create'])->name('membros.create');
