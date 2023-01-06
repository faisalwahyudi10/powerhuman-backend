<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\TeamController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\ResponsibilityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Company API
Route::prefix('company')->middleware('auth:sanctum')
    ->controller(CompanyController::class)->name('company.')->group(function () {
        Route::get('', 'fetch')->name('fetch');
        Route::post('', 'create')->name('create');
        Route::post('update/{id}', 'update')->name('update');
    });

// Team API
Route::prefix('team')->middleware('auth:sanctum')
    ->controller(TeamController::class)->name('team.')->group(function () {
        Route::get('', 'fetch')->name('fetch');
        Route::post('', 'create')->name('create');
        Route::post('update/{id}', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('delete');
    });

// Role API
Route::prefix('role')->middleware('auth:sanctum')
    ->controller(RoleController::class)->name('role.')->group(function () {
        Route::get('', 'fetch')->name('fetch');
        Route::post('', 'create')->name('create');
        Route::post('update/{id}', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('delete');
    });

// Responsibility API
Route::prefix('responsibility')->middleware('auth:sanctum')
->controller(ResponsibilityController::class)->name('reponsibility.')->group(function () {
    Route::get('', 'fetch')->name('fetch');
    Route::post('', 'create')->name('create');
    Route::delete('{id}', 'destroy')->name('delete');
});

// Employee API
Route::prefix('employee')->middleware('auth:sanctum')
    ->controller(EmployeeController::class)->name('employee.')->group(function () {
        Route::get('', 'fetch')->name('fetch');
        Route::post('', 'create')->name('create');
        Route::post('update/{id}', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('delete');
    });

// Auth API
Route::name('auth.')->controller(UserController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');

    Route::middleware('auth.sanctum')->group(function () {
        Route::post('logout', 'logout')->name('logout');
        Route::get('user', 'fetch')->name('fetch');
    });
});
