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

Route::get('/', function () {
    return redirect()->route('formulaire');
});
//Utilisateur's Routes
Route::prefix('concorde')->group(function(){
    Route::get('/formulaire', [IndexController::class, 'index'])->name('formulaire');
    Route::post('/formulaire', [IndexController::class,'enregistrement'])->name('formulaire.post');
    Route::get('/formulaire/valide', [IndexController::class, 'valide'])->name('valide');
});

//Admin's Routes
Route::prefix('concorde/admin')->group(function(){
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('login');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');
    Route::get('/export', [AdminController::class, 'exportUsersData'])->name('admin.export-data')->middleware('auth:admin');
    Route::get('/logout', [AdminController::class,'logout'])->name('admin.logout')->middleware('auth:admin');
});

