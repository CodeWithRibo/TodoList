<?php

use App\Http\Controllers\Task;
use Illuminate\Support\Facades\Route;


Route::get('/',[Task::class,'index'])->name('index');
Route::post('/',[Task::class,'add'])->name('add');
Route::post('/{taskList}',[Task::class,'edit'])->name('edit');
Route::delete( '/{taskList}',[Task::class,'destroy'])->name('destroy');
