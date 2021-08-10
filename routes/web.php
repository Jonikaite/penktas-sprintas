<?php

use Illuminate\Support\Facades\Auth;
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
    Route::middleware(['auth'])->group(function () {
    Route::resource('employee', App\Http\Controllers\EmployeeController::class);
    Route::resource('project', App\Http\Controllers\ProjectController::class);
    Route::get('project/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('project.edit');
});


Route::get('/home', [App\Http\Controllers\EmployeeController::class, 'index']);