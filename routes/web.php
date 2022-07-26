<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CustomerController::class, 'index'])->name('index');


Route::get('/task/one/pdf', [CustomerController::class, 'taskOnePdf'])->name('task-one-pdf');
Route::post('/task/one/pdf/store', [CustomerController::class, 'taskOnePdfStore'])->name('task-one-pdf-store');
Route::get('/task/one/examine/list', [CustomerController::class, 'taskOneExamineList'])->name('task-one-examine-list');
Route::post('/task/one/examine/data', [CustomerController::class, 'taskOneExamineData'])->name('task-one-examine-data');
Route::get('/task/one/examine', [CustomerController::class, 'taskOneExamine'])->name('task-one-examine');


Route::get('/task/two', [CustomerController::class, 'taskTwo'])->name('task-two');
Route::post('/task/two/data', [CustomerController::class, 'taskTwoData'])->name('task-two-data');
Route::post('/task/two/subscribe', [CustomerController::class, 'taskTwoSubscribe'])->name('task-two-subscribe');


Route::get('/task/three', [CustomerController::class, 'taskThree'])->name('task-three');
Route::post('/task/three/data', [CustomerController::class, 'taskThreeData'])->name('task-three-data');
Route::post('/task/three/new/subscribe', [CustomerController::class, 'taskThreeNewSubscribe'])->name('task-three-new-subscribe');

