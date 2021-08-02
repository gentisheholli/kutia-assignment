<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PageBuilderController;
use App\Http\Controllers\FileManagementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');



Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom-login'); 

Route::group(['middleware' => 'auth','role'], function () {

    Route::get('page-builders', [PageBuilderController::class, 'index'])->name('pageBuilder.allPages');
    Route::get('page-builder/{id}', [PageBuilderController::class, 'show'])->name('pageBuilder.show');
    Route::get('page-builder', [PageBuilderController::class, 'create'])->name('pageBuilder.create'); 
    Route::post('page-builder', [PageBuilderController::class, 'store'])->name('pageBuilder.store'); 
    Route::get('page-builder/{id}', [PageBuilderController::class, 'edit'])->name('pageBuilder.edit'); 
    Route::post('page-builder/{id}', [PageBuilderController::class, 'update'])->name('pageBuilder.update'); 
    Route::delete('page-builder/{id}', [PageBuilderController::class, 'destroy'])->name('pageBuilder.delete');

    Route::get('files', [FileManagementController::class, 'index'])->name('fileManagement.allFiles');
    Route::get('file/{id}', [FileManagementController::class, 'show'])->name('fileManagement.show');
    Route::get('file', [FileManagementController::class, 'create'])->name('fileManagement.create'); 
    Route::post('file', [FileManagementController::class, 'store'])->name('fileManagement.store'); ;
    Route::delete('file/{id}', [FileManagementController::class, 'destroy'])->name('fileManagement.delete');

        
    Route::get('roles', [RoleController::class, 'index']);
    Route::get('role/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('role', [RoleController::class, 'create'])->name('roles.create'); 
    Route::post('role', [RoleController::class, 'store'])->name('roles.store'); ;
    //Route::get('role/{id}', [RoleController::class, 'edit'])->name('roles.edit'); 
    Route::post('role/{id}', [RoleController::class, 'update'])->name('roles.update');  
    Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('roles.delete');


        
    Route::get('permissions', [PermissionController::class, 'index']);
    Route::get('permission/{id}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('permission', [PermissionController::class, 'create'])->name('permissions.create'); 
    Route::post('permission', [PermissionController::class, 'store'])->name('permissions.store'); ;
    //Route::get('permission/{id}', [PermissionController::class, 'edit'])->name('roles.edit'); 
    Route::post('permission/{id}', [PermissionController::class, 'update'])->name('permissions.update');  
    Route::delete('permission/{id}', [PermissionController::class, 'destroy'])->name('permissions.delete');


    Route::get('users', [UserController::class, 'index']);
    Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('user', [UserController::class, 'create'])->name('user.create'); 
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

});