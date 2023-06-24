<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/membros/create', [MembroController::class, 'create'])->name('membros.create');
Route::post('/membros', [MembroController::class, 'store'])->name('membros.store');

Route::middleware(['custom.auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/homepage', [HomePageController::class, 'index'])->name('homepage.index');
    Route::get('/membros/{membroId}', [MembroController::class, 'edit'])->name('membros.edit');
    Route::put('/membros/{membroId}', [MembroController::class, 'update'])->name('membros.update');
    Route::delete('/membros/{membroId}', [MembroController::class, 'delete'])->name('membros.delete');
    Route::get('/tarefas', [TarefaController::class, 'list'])->name('tarefas.list');
    Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
    Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::get('/tarefas/{tarefaId}', [TarefaController::class, 'edit'])->name('tarefas.edit');
    Route::put('/tarefas/{tarefaId}', [TarefaController::class, 'update'])->name('tarefas.update');
    Route::put('/tarefas/{tarefaId}', [TarefaController::class, 'finalizada_update'])->name('tarefas.finalizada_update');
    Route::delete('/tarefas/{tarefaId}', [TarefaController::class, 'delete'])->name('tarefas.delete');
});

