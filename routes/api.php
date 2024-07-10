<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/biodata', [BiodataController::class, 'get'])->middleware('token');
Route::post('/biodata', [BiodataController::class, 'create'])->middleware('token');
Route::put('/biodata', [BiodataController::class, 'update'])->middleware('token');