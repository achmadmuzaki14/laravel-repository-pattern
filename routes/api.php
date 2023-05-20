<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
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

Route::prefix('posts')->group(function(){
    // Route::get('all-read', [PostController::class, 'getAllReadPost']);
    Route::get('/', [PostController::class, 'index']);
    Route::get('{postId}', [PostController::class,'show']);
    Route::post('/', [PostController::class,'store']);
    Route::put('{postId}', [PostController::class, 'update']);
    Route::delete('{postId}', [PostController::class, 'destroy']);
});

