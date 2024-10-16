<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'showAllUsers'])->name('showAllUsers');

Route::get('/users/create', [UserController::class, 'createUser'])->name('createUser');
Route::post('/users/store', [UserController::class, 'storeUser'])->name('storeUser');

Route::get('/users/{id}', [UserController::class, 'viewUser'])->name('viewUser');

Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('editUser');
Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');
Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');

