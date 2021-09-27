<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
Route::post('/thanks',[WorkController::class,'thanks']);
//休憩開始
Route::post('/rest_start',[WorkController::class,'rest_start']);
//休憩終了
Route::post('/breaks_end',[WorkController::class,'breaks_end']);
//logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');