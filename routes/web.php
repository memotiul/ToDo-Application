<?php

use App\Http\Controllers\AuthController;
 
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('profile', [AuthController::class, 'profile']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('change-password', [AuthController::class,'edit'])->name('change-password');
Route::post('change-password', [AuthController::class,'store'])->name('change.password');
Route::get('addquestion', [AuthController::class, 'addquestion'])->name('add-question');
Route::post('customadd', [AuthController::class, 'customadd'])->name('custom.add');
Route::get('todolist', [AuthController::class, 'todolist'])->name('todo-details');
Route::get('qview/{id}', [AuthController::class, 'qview']);
Route::get('userDetails', [AuthController::class, 'userDetails'])->name('user-details');
Route::get('destroy/{id}', [AuthController::class, 'destroy']);
Route::get('todoedit/{id}', [AuthController::class, 'todoedit'])->name('edit-todo');
Route::put('update/{id}',[AuthController::class,'update'])->name('update-todo');