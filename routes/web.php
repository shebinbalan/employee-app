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

Route::get('/users', [App\Http\Controllers\UserController::class,'index']);
Route::get('/users', [App\Http\Controllers\UserController::class,'index'])->name('index');
Route::get('/add-user', [App\Http\Controllers\UserController::class,'add']);
Route::post('/insert-user', [App\Http\Controllers\UserController::class,'insert']);
Route::get('/ edit-user/{id}', [App\Http\Controllers\UserController::class,'edit']);
Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class,'update']);
Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class,'destroy']);
//Route::get('/search', [App\Http\Controllers\UserController::class,'search'])->name('user.search');
Route::get('/action', [UserController::class, 'action'])->name('action');
