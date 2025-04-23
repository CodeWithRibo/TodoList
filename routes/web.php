<?php

use App\Http\Controllers\Task;
use Illuminate\Support\Facades\Route;


Route::get('/',[Task::class,'index'])->name('index');
Route::post('/',[Task::class,'add'])->name('add');
Route::delete( '/{taskList}',[Task::class,'destroy'])->name('destroy');

Route::get('/update={taskList}',[Task::class,'showEdit'])->name('showEdit');
Route::put('/update={taskList}',[Task::class,'edit'])->name('updateData');


