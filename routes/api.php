<?php

use App\Http\Controllers\DoctorController;
use App\Models\Doctor;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/doctor/store', [DoctorController::class, 'store']);

Route::prefix('/doctor')->group( function () {
    Route::post('store', [DoctorController::class, 'store']);
    Route::put('update/{id}', [DoctorController::class, 'update']);
    Route::get('show/{doctor}', [DoctorController::class, 'show']);
    Route::delete('delete/{doctor}', [DoctorController::class, 'destroy']);
});