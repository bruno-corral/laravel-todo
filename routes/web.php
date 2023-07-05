<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('user.loginAction');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAction'])->name('user.registerAction');

//Auth Middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/task', [TaskController::class, 'index'])->name('task.view');
    Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task/new/createAction', [TaskController::class, 'createAction'])->name('task.createAction');
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('task/edit/editAction', [TaskController::class, 'editAction'])->name('task.editAction');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');
});

//Rota de página não encontrada
Route::fallback(function () {
    return redirect(route('login'));
});
