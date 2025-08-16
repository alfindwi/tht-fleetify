<?php

use App\Http\Controllers\AttedancesHistoryController;
use App\Http\Controllers\AttendancesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');


Route::get('/departements', [App\Http\Controllers\DepartementController::class, 'index'])->name('departements.index');
Route::get('/departements/create', [App\Http\Controllers\DepartementController::class, 'create'])->name('departements.create');
Route::post('/departements', [App\Http\Controllers\DepartementController::class, 'store'])->name('departements.store');
Route::get('/departements/{id}/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements.edit');
Route::put('/departements/{id}', [App\Http\Controllers\DepartementController::class, 'update'])->name('departements.update');
Route::delete('/departements/{id}', [App\Http\Controllers\DepartementController::class, 'destroy'])->name('departements.destroy');
Route::get('/departements/{id}', [App\Http\Controllers\DepartementController::class, 'show'])->name('departements.show');

Route::get('/attendance', [AttendancesController::class, 'index'])->name('attendances.index');
Route::post('/attendance/in', [AttendancesController::class, 'clockIn'])->name('attendances.in');
Route::put('/attendance/out/{attendanceId}', [AttendancesController::class, 'clockOut'])->name('attendances.out');
Route::get('/attendances/history', [AttedancesHistoryController::class, 'logs'])->name('attendances.history');
