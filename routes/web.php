<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TemuanController;
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
    Route::get('/dashboard-pop',[DashboardController::class,'dashboardpop']);
    Route::get('/dashboard-pop/detail/{id}',[DashboardController::class,'popdetail']);
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/filter',[DashboardController::class,'filter']);
    
    Route::resource('/jadwal',JadwalController::class);
    Route::post('/jadwal/{id}/realisasi',[JadwalController::class,'realisasi']);

    Route::resource('/improvement',ImprovementController::class);
    Route::post('/improvement/{id}/realisasi',[ImprovementController::class,'realisasi']);

    Route::resource('/pop', PopController::class);
    Route::get('/pop/teknis/{id}',[PopController::class,'teknis']);
    Route::post('/pop/teknis/listrik/{id}',[PopController::class,'updateKelistrikan']);
    Route::post('/pop/teknis/listrik',[PopController::class,'createKelistrikan']);
    Route::get('/pop/teknis/listrik/{id}',[PopController::class,'indexKelistrikan']);
    Route::post('/pop/teknis/suhu/{id}',[PopController::class,'updateSuhu']);
    Route::post('/pop/teknis/suhu',[PopController::class,'createSuhu']);
    Route::get('/pop/teknis/suhu/{id}',[PopController::class,'indexSuhu']);
    Route::post('/pop/teknis/genset/{id}',[PopController::class,'updateGenset']);
    Route::post('/pop/teknis/genset',[PopController::class,'createGenset']);
    Route::get('/pop/teknis/genset/{id}',[PopController::class,'indexGenset']);
    Route::post('/pop/teknis/recti-battere/{id}',[PopController::class,'updateRectiBattere']);
    Route::post('/pop/teknis/recti-battere',[PopController::class,'createRectiBattere']);
    Route::get('/pop/teknis/recti-battere/{id}',[PopController::class,'indexRectiBattere']);
    // Route::get('/pop/teknis',[PopController::class,'createKelistrikan']);
    Route::resource('/user', UserController::class)->middleware('admin');
    Route::get('/temuan',[TemuanController::class,'index']);
    Route::post('/temuan',[TemuanController::class,'store']);
    Route::get('/temuan/improve/{id}',[TemuanController::class,'improve']);
    Route::delete('/temuan/{id}',[TemuanController::class,'destroy']);
    Route::get('/temuan/{id}/edit',[TemuanController::class,'edit']);
    Route::post('/temuan/{id}/edit',[TemuanController::class,'update']);
    // Route::get('/get-data',[ImprovementController::class,'temuan'])->name('getData');
});