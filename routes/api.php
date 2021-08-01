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
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration']);
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('page-builders', [PageBuilderController::class, 'index']);
Route::get('page-builder/{id}', [PageBuilderController::class, 'show'])->name('pageBuilder.show');
Route::get('page-builder', [PageBuilderController::class, 'create'])->name('pageBuilder.create'); 
Route::post('page-builder', [PageBuilderController::class, 'store']);
//Route::get('page-builder/{id}', [PageBuilderController::class, 'edit'])->name('pageBuilder.edit'); 
Route::post('page-builder/{id}', [PageBuilderController::class, 'update']); 
Route::delete('page-builder/{id}', [PageBuilderController::class, 'destroy'])->name('pageBuilder.delete');

Route::get('files', [FileManagementController::class, 'index']);
Route::get('file/{id}', [FileManagementController::class, 'show'])->name('fileManagement.show');
Route::get('file', [FileManagementController::class, 'create'])->name('fileManagement.create'); 
Route::post('file', [FileManagementController::class, 'store']);
//Route::get('file/{id}', [FileManagementController::class, 'edit'])->name('fileManagement.edit'); 
Route::post('file/{id}', [FileManagementController::class, 'update']); 
Route::delete('file/{id}', [FileManagementController::class, 'destroy'])->name('fileManagement.delete');

Route::get('roles', [RoleController::class, 'index']);
Route::get('role/{id}', [RoleController::class, 'show'])->name('roles.show');
Route::get('role', [RoleController::class, 'create'])->name('roles.create'); 
Route::post('role', [RoleController::class, 'store']);
//Route::get('role/{id}', [RoleController::class, 'edit'])->name('roles.edit'); 
Route::post('role/{id}', [RoleController::class, 'update']); 
Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('roles.delete');

Route::get('users', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('user', [UserController::class, 'create'])->name('user.create'); 
Route::post('user', [UserController::class, 'store']);
//Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit'); 
Route::post('user/{id}', [UserController::class, 'update']); 
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.delete');