<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

//////////////////////////////////////////////// PRIVATE ROUTES ////////////////////////////////////////////////
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('categories/{categoria}', [CategoriaController::class, 'show']);
Route::middleware('auth:sanctum')->put('categories/{categoria}', [CategoriaController::class, 'update']);
Route::middleware('auth:sanctum')->delete('categories/{categoria}', [CategoriaController::class, 'destroy']);
//////////////////////////////////////////////// PUBLIC ROUTES ////////////////////////////////////////////////
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// categories
Route::middleware('auth:sanctum')->post('categories/create', [CategoriaController::class, 'store']);

//categories
Route::get('categories',[CategoriaController::class,'index']);
