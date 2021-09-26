<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/index', [WorkController::class,'index']);

Route::get('/', [WorkController::class,'work'])->middleware('auth');
Route::get('/attendance', [WorkController::class,'attendance']);
//勤務開始
Route::post('/start', [WorkController::class,'start']);
//勤務終了
Route::post('/end',[WorkController::class,'update']);
Route::get('/thanks',[WorkController::class,'thanks']);
//休憩開始
Route::get('/rest',[WorkController::class,'rest']);
//休憩終了
Route::get('/breaks_end',[WorkController::class,'rest_start']);
Route::post('/rest_end',[WorkController::class,'rest_end']);