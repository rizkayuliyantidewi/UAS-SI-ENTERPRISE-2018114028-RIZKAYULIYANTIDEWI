<?php
use App\Http\Controllers\MhsController;
use App\Http\Controllers\MtkController;
use App\Http\Controllers\AbsController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\JdwlController;
use App\Http\Controllers\SmtController;
use Illuminate\Support\Facades\Route;

Route::resource('mahasiswas',MhsController::class);
Route::resource('matakuliahs',MtkController::class);
Route::resource('absensis',AbsController::class);
Route::resource('kontraks',KontrakController::class);
Route::resource('jadwals',JdwlController::class);
Route::resource('semesters',SmtController::class);

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

Route::get('',[MhsController::class,'index']);
Route::get('',[MtkController::class,'index']);
Route::get('',[AbsController::class,'index']);
Route::get('',[KontrakController::class,'index']);
Route::get('',[JdwlController::class,'index']);
Route::get('',[SmtController::class,'index']);
Route::POST('submit', 'MhsController@submit')->name('submit');
Route::delete('/mahasiswas/{id}', [MhsController::class,'destroy']);
