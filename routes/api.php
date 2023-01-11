<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BodyTypeController;
use App\Http\Controllers\BodyTypeGuitarController;
use App\Http\Controllers\GuitarController;
use App\Http\Controllers\ManufacturerController;
use App\Models\BodyType;
use App\Models\Manufacturer;
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

// Route::resource('guitars', GuitarController::class)->only(['index', 'show', 'destroy']);

// Route::get('/bodyTypes', [BodyTypeController::class, 'index']);
// Route::get('/bodyTypes/{id}', [BodyTypeController::class, 'show']);

// Route::post('/bodyTypes', [BodyTypeController::class, 'store']);

// Route::resource('bodyTypes', BodyTypeController::class)->except('create', 'edit');

// Route::resource('manufacturers', ManufacturerController::class)->except('create', 'edit');

// Route::get('bodyTypes/{id}/guitars', [BodyTypeGuitarController::class, 'index'])->name('bodyTypes.guitars.index');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('manufacturers', ManufacturerController::class)->only(['update', 'store', 'destroy']);
    Route::resource('bodyTypes', ManufacturerController::class)->only(['update', 'store', 'destroy']);
    Route::resource('guitars', GuitarController::class)->only(['destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('manufacturers', ManufacturerController::class)->only(['index', 'show']);
Route::resource('bodyTypes', BodyTypeController::class)->only(['index', 'show']);
Route::resource('guitars', GuitarController::class)->only(['index', 'show']);
Route::resource('bodyTypes.guitars', BodyTypeGuitarController::class)->only(['index']);