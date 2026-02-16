<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ParamController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\SliderController;

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

Route::get('/products', [ProductController::class, 'index']);
Route::get('/param', [ParamController::class,'getParam']);
Route::put('/param/{id}', [ParamController::class, 'update']);

Route::post('/saveMenu', [MasterController::class, 'saveMenu']);
Route::delete('/deleteMenu/{id}', [MasterController::class, 'deleteMenu']);
Route::post('/updateMenu/{id}', [MasterController::class, 'updateMenu']);

Route::post('/slider/manage/{id}', [SliderController::class, 'manageSlider']);

// Signature Menu
// Makanan
Route::get('/signature/makanan', [ProductController::class, 'getSignatureMakanan']);
// Minuman
Route::get('/signature/minuman', [ProductController::class, 'getSignatureMinuman']);
// Camilan
Route::get('/signature/camilan', [ProductController::class, 'getSignatureCamilan']);