<?php

use App\Http\Controllers\ModulesController;
use App\Http\Controllers\ModuleTypesController;
use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\SchedulerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ObjectsController::class, 'index'])->middleware(['auth', 'verified']);

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/objects', ObjectsController::class);
    Route::resource('/modules', ModulesController::class)->except(['create']);
    Route::get('/modules/create/{object_id}', [ModulesController::class, 'create'])->name('modules.create');
    Route::resource('/schedulers', SchedulerController::class)->except(['create']);
    Route::get('/schedulers/create/{module}', [SchedulerController::class, 'create'])->name('schedulers.create');
});
