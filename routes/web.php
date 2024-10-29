<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[TaskController::class,'home'])->name('home');

Route::get('create-task',[TaskController::class,'create'])->name('create.task');

Route::post('save-task',[TaskController::class,'save'])->name('save.task');

Route::get('edit-task/{taskId}',[TaskController::class,'edit'])->name('edit.task');

Route::put('update-task',[TaskController::class,'update'])->name('update.task');

Route::get('delete-task/{taskId}',[TaskController::class,'delete'])->name('delete.task');

