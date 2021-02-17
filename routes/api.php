<?php

use App\Http\Controllers\Api\MhsController;
use App\Http\Controllers\Api\MtkController;
use App\Http\Controllers\Api\AbsController;
use App\Http\Controllers\Api\KontrakController;
use App\Http\Controllers\Api\JdwlController;
use App\Http\Controllers\Api\SmtController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('mahasiswas',MhsController::class);
Route::resource('matakuliahs',MtkController::class);
Route::resource('absensis',AbsController::class);
Route::resource('kontraks',KontrakController::class);
Route::resource('jadwals',JdwlController::class);
Route::resource('semesters',SmtController::class);
