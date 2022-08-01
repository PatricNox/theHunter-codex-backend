<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

/* Fallback route */

Route::fallback(function () {
    return response()->json([__('error') => __('Route doesn\'t exist.')], 404);
});

/* Auth */
// Route::post('auth', [Api\Auth\AuthController::class, 'authenticate']);
// Route::middleware('auth:system')->group(function () {
    // Route::post('refreshToken', 'Api\SystemController@refreshToken');
// });
