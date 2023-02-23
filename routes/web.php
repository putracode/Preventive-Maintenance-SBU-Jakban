<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImprovementController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/test', function () {
//     return view('layout.adminlte');
// });



Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/',[AuthController::class,'authenticate']);
Route::post('/logout',[AuthController::class,'logout']);

Route::post('/user/password/{id}',[UserController::class,'password']);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/filter',[DashboardController::class,'filter']);
    
    Route::resource('/jadwal',JadwalController::class);
    Route::post('/jadwal/{id}/realisasi',[JadwalController::class,'realisasi']);

    Route::resource('/improvement',ImprovementController::class);
    Route::post('/improvement/{id}/realisasi',[ImprovementController::class,'realisasi']);

    Route::resource('/pop', PopController::class);
    Route::resource('/user', UserController::class)->middleware('admin');
});