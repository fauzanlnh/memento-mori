<?php

use App\Http\Controllers\API\VillageController;
use Illuminate\Support\Facades\Route;

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

Route::get('desa', [VillageController::class, 'getAllVillage']);
Route::get('desa/{village}', [VillageController::class, 'getVillageById']);
Route::post('desa', [VillageController::class, 'createVillage']);
Route::put('desa/{id}', [VillageController::class, 'updateVillageById']);
Route::delete('desa/{id}', [VillageController::class, 'deleteVillageById']);
