<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ActionLogsController;

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
    Route::get('/categoryPage',[AuthController::class,'category'])->middleware('auth:sanctum');

 Route::post('/user/login',[AuthController::class,'login']);
 Route::post('/user/register',[AuthController::class,'register']);
 Route::get('/getPostData',[PostController::class,'getPostData']);
Route::get('/getCategoryData',[CategoryController::class,'getCategoryData']);
Route::post('/searchData',[PostController::class,'searchPostData']);
Route::post('/searchCategory',[CategoryController::class,'searchCategorData']);
Route::post('/getPostData',[PostController::class,'getPost']);
Route::post('/actionLogsData',[ActionLogsController::class,'setActionLogs']);
Route::post('/getContactData',[ContactController::class,'contactData']);
