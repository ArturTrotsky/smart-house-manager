<?php

use App\Http\Controllers\ModulesController;
use App\Http\Controllers\ModuleTypesController;
use App\Http\Controllers\ObjectsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/objects', ObjectsController::class)->middleware(['auth']);
Route::resource('/modules', ModulesController::class)->except(['create'])->middleware(['auth']);
Route::get('/object/{object_id}/modules/create', [ModulesController::class, 'create'])->name('modules.create')->middleware(['auth']);
Route::resource('/module_types', ModuleTypesController::class)->middleware(['auth']);
