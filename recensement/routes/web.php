<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [IndexController::class, 'index']);

Route::post('/enregistrement', [IndexController::class,'enregistrement'])->name('user.enregistrement');

Route::get('/enregistrement/valide', function () {
    return view('valide');
})->name('valide');

Route::get('/export', [IndexController::class, 'exportUsersData']);

Route::get('/Admin/login', [AdminController::class, 'index'])->name('admin.login');
Route::post('/Admin/login', [AdminController::class, 'login'])->name('login');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');
