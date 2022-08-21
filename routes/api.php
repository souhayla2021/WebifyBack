<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\CategorieController;


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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */
Route::middleware('auth:api')->get('/token/revoke', function (Request $request) {
    DB::table('oauth_access_tokens')
        ->where('user_id', $request->user()->id)
        ->update([
            'revoked' => true
        ]);
    return response()->json('DONE');
});


Route::prefix('project')->group(function () {
    Route::get('/',[ ProjectController::class, 'getAll']);
    Route::post('/',[ ProjectController::class, 'create']);
    Route::delete('/{id}',[ ProjectController::class, 'delete']);
    Route::get('/{id}',[ ProjectController::class, 'get']);
    Route::put('/{id}',[ ProjectController::class, 'update']);
});

Route::prefix('categorie')->group(function () {
    Route::get('/',[CategorieController::class, 'getAll']);
    Route::post('/',[ CategorieController::class, 'create']);
    Route::delete('/{id}',[ CategorieController::class, 'delete']);
    Route::get('/{id}',[ CategorieController::class, 'get']);
    Route::put('/{id}',[ CategorieController::class, 'update']);
});