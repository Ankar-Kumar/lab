<?php

use App\Http\Controllers\EmployeeController;
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



Route::patch('/books/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');


Route::get('/employee/search', [EmployeeController::class, 'search'])->name('employees.search');


Route::get('/employ/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employs', [EmployeeController::class, 'store'])->name('employees.store');

route::get('/',[EmployeeController::class, 'index'])->name('employees.index');
route::get('/employee/{id}',[EmployeeController::class,'destroy'])->name('employees.destroy');
Route::get('/employ/{id}/show', [EmployeeController::class, 'show'])->name('employees.show');