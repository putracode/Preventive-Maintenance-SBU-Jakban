<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImprovementController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;
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

Route::get('/test', function () {
    return view('layout.adminlte');
});

route::get('/',[DashboardController::class,'index']);
route::resource('/jadwal',JadwalController::class);
route::post('/jadwal/{id}/realisasi',[JadwalController::class,'realisasi']);
route::resource('/improvement',ImprovementController::class);
route::post('/improvement/{id}/realisasi',[ImprovementController::class,'realisasi']);
route::get('/filter',[DashboardController::class,'filter']);