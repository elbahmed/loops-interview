<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
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

Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', function () {
    return redirect()->to('/dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboards.index');
    });

    Route::prefix('packages')->group(function () {
        Route::get('', [PackageController::class, 'list']);
        Route::get('/create', [PackageController::class, 'create']);
        Route::get('/edit/{id}', [PackageController::class, 'edit'])->whereNumber('id');
        Route::get('/{id}', [PackageController::class, 'show'])->whereNumber('id');
        Route::post('', [PackageController::class, 'store']);
        Route::put('/{id}', [PackageController::class, 'update'])->whereNumber('id');
        Route::delete('/all', [PackageController::class, 'truncate']);
        Route::delete('/{id}', [PackageController::class, 'destroy'])->whereNumber('id');
    });

    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'list']);
        Route::get('/create', [UserController::class, 'create']);
        Route::get('/edit-password/{id}', [UserController::class, 'editPassword'])->whereNumber('id');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->whereNumber('id');
        Route::get('/{id}', [UserController::class, 'show'])->whereNumber('id');
        Route::post('confirm-payment/{id}', [UserController::class, 'confirmPayment'])->whereNumber('id');
        Route::post('', [UserController::class, 'store']);
        Route::put('/edit-password/{id}', [UserController::class, 'updatePassword'])->whereNumber('id');
        Route::put('/{id}', [UserController::class, 'update'])->whereNumber('id');
        Route::delete('/all', [UserController::class, 'truncate']);
        Route::delete('/{id}', [UserController::class, 'destroy'])->whereNumber('id');
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});
