<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
session_start();

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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    //     'appName' => config('app.name')
    // ]);
    return redirect('/login');
})->name('welcome');

Route::get('/dashboard', function () {
    $user = Auth::user();
    return Inertia::render('Dashboard', compact('user'));
})->middleware('auth')->name('dashboard');

// PERMISSIONS
Route::prefix('permission')->middleware('auth')->group(function () {
    Route::get('/', [PermisionController::class, 'index'])->name('permission');
    Route::get('/create', [PermisionController::class, 'create'])->name('permission.create');
    Route::post('/store', [PermisionController::class, 'store'])->name('permission.store');
});

// ROLES
Route::prefix('role')->middleware('auth')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('/update', [RoleController::class, 'update'])->name('role.update');
});

// USER MANAGEMENT ROUTE
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');

    // profile
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update/{id}', [UserProfileController::class, 'update'])->name('user.profile.update');
});

require __DIR__ . '/auth.php';