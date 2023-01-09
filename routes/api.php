<?php

use App\Http\Controllers\BodyTypeController;
use App\Http\Controllers\BodyTypeGuitarController;
use App\Http\Controllers\GuitarController;
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


// Route::get('guitars', [GuitarController::class, 'index']);
// Route::get('guitars/{id}', [GuitarController::class, 'show']);

Route::resource('guitars', GuitarController::class);

Route::get('/bodyTypes', [BodyTypeController::class, 'index']);
Route::get('/bodyTypes/{id}', [BodyTypeController::class, 'show']);

// Route::get('bodyTypes/{id}/guitars', [BodyTypeGuitarController::class, 'index'])->name('bodyTypes.guitars.index');

Route::resource('bodyTypes.guitars', BodyTypeGuitarController::class)->only(['index']);
