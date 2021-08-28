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
//勤務開始
Route::get('/start', [WorkController::class,'start']);

Route::post('/attendance', [WorkController::class,'attendance']);
Route::get('/end',[WorkController::class,'end']);
Route::post('/end',[WorkController::class,'update']);