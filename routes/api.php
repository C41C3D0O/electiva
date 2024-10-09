<?php

use App\Http\Controllers\Api\TareaApiController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get(uri: 'tareas',action:[TareaApiController::class,'index']);
Route::post(uri: 'tareas',action:[TareaApiController::class,'store']);
Route::get(uri: 'tareas/{id}',action:[TareaApiController::class,'show']);
Route::put(uri: 'tareas/{id}',action:[TareaApiController::class,'update']);
Route::delete(uri: 'tareas/{id}',action:[TareaApiController::class,'destroy']);
