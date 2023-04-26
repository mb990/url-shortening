<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('url')->name('url.')->group(function () {
    Route::get('/{url}', [UrlController::class, 'show'])->name('show');
    Route::post('/', [UrlController::class, 'store'])->name('store');
    Route::put('/{url}', [UrlController::class, 'update'])->name('update');
});


