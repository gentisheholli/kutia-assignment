<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PageBuilderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('page-builders', [PageBuilderController::class, 'index']);
Route::get('page-builder/{id}', [PageBuilderController::class, 'show'])->name('pageBuilder.show');
Route::get('page-builder', [PageBuilderController::class, 'create'])->name('pageBuilder.create'); 
Route::post('page-builder', [PageBuilderController::class, 'store']);
//Route::get('page-builder/{id}', [PageBuilderController::class, 'edit'])->name('pageBuilder.edit'); 
Route::post('page-builder/{id}', [PageBuilderController::class, 'update']); 
Route::delete('page-builder/{id}', [PageBuilderController::class, 'destroy'])->name('pageBuilder.delete');