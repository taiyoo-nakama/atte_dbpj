<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\BreakController;
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
    return view('welcome');
});

Route::get('/', [WorkController::class,'work']);
Route::get('/attendance', [WorkController::class,'attendance']);
//勤務開始
Route::post('/start', [WorkController::class,'start']);
//勤務終了
//Route::get('/end',[WorkController::class,'end']);
Route::post('/end',[WorkController::class,'update']);
//休憩開始
Route::post('/rest_start',[WorkController::class,'rest_start']);
//休憩終了
Route::post('/rest_end',[WorkController::class,'rest_end']);
