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

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks',[TaskController::class,'index'])->name('tasks.index');
Route::get('task-list',[TaskController::class,'taskList'])->name('tasks.taskList');
Route::get('tasks/create',[TaskController::class,'create'])->name('tasks.create');
Route::post('tasks/store',[TaskController::class,'store'])->name('tasks.store');
Route::post('tasks/update/{id}',[TaskController::class,'update'])->name('tasks.update');
Route::get('tasks/{id}/edit',[TaskController::class,'edit'])->name('tasks.edit');
// Route::put('tasks/{id}',[TaskController::class,'update'])->name('tasks.update');
Route::get('tasks/delete/{id}',[TaskController::class,'destroy'])->name('tasks.destroy');
Route::post('tasks/update_positions', [TaskController::class, 'updatePositions'])->name('update_positions');
