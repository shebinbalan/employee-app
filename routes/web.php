<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\UserController;

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
Route::resource('departments', DepartmentController::class);
Route::resource('designations', DesignationController::class);

Route::get('/users', [UserController::class,'index']);
Route::get('/users', [UserController::class,'index'])->name('index');
Route::get('/add-user', [UserController::class,'add']);
Route::post('/insert-user', [UserController::class,'insert']);
//Route::get('/search', [App\Http\Controllers\UserController::class,'search'])->name('user.search');
Route::get('/action', [UserController::class, 'action'])->name('action');
