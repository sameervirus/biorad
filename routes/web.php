<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SelfLearningController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UsersController;
use App\Models\SelfLearning;

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


Route::get('/home', function() {return inertia('Home');});
Route::get('/', function() {return inertia('Home');});

Route::get('/training', [TrainingController::class, 'website']);
Route::get('/training/self-learning-courses', [SelfLearningController::class, 'website']);
Route::get('/training/sales-training-courses', [SelfLearningController::class, 'sales']);
Route::get('/training/applicatons-training-courses', [SelfLearningController::class, 'apps']);
Route::get('/training/new-comers/{segment}', [SelfLearningController::class, 'segment']);

Route::get('/technical-services', function() { return inertia('Technical/Index'); });
Route::get('/solutions', function() { return inertia('Solutions/Index'); });








Route::prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');

    // Users

    Route::get('users', [UsersController::class, 'index'])
        ->name('users')
        ->middleware(['permission:show users']);

    Route::get('users/create', [UsersController::class, 'create'])
        ->name('users.create')
        ->middleware(['permission:create users']);

    Route::post('users', [UsersController::class, 'store'])
        ->name('users.store')
        ->middleware(['permission:create users']);

    Route::get('users/{user}/edit', [UsersController::class, 'edit'])
        ->name('users.edit')
        ->middleware(['permission:edit users']);

    Route::put('users/{user}', [UsersController::class, 'update'])
        ->name('users.update')
        ->middleware(['permission:edit users']);

    Route::delete('users/{user}', [UsersController::class, 'destroy'])
        ->name('users.destroy')
        ->middleware(['permission:delete users']);

    Route::put('users/{user}/restore', [UsersController::class, 'restore'])
        ->name('users.restore')
        ->middleware(['permission:delete users']);

    // Roles
    Route::resource('roles', RolesController::class);
    Route::resource('trainings', TrainingController::class);
    Route::resource('self-learning', SelfLearningController::class);

    // Images

    Route::get('/img/{path}', [ImagesController::class, 'show'])
        ->where('path', '.*')
        ->name('image');
});

Route::get('/login', [AuthenticatedController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedController::class, 'authenticate'])
    ->name('login.store')
    ->middleware('guest');

Route::get('/forgot-password', [AuthenticatedController::class, 'forgot'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [AuthenticatedController::class, 'email'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [AuthenticatedController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [AuthenticatedController::class, 'updatePassword'])
    ->middleware('guest')
    ->name('password.update');

Route::delete('logout', [AuthenticatedController::class, 'destroy'])
    ->name('logout');