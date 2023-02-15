<?php

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

Route::get('/communities', [CommunityController::class, 'index']);
Route::post('/communities', [CommunityController::class, 'store']);
Route::get('/communities/{community}', [CommunityController::class, 'show']);
Route::get('/communities/{community}/edit', [CommunityController::class, 'edit']);
Route::put('/communities/{community}', [CommunityController::class, 'update']);
Route::delete('/communities/{community}', [CommunityController::class, 'destroy']);
