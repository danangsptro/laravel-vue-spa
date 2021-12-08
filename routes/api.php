<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FormController;
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



Route::group(['prefix' => 'backend'], function(){
    Route::get('/', [FormController::class, 'index'])->name('form.index');
    Route::post('/post', [FormController::class, 'store'])->name('form.store');
    Route::put('/update/{id}', [FormController::class, 'update'])->name('form.update');
    Route::delete('/delete/{id}', [FormController::class, 'destroy'])->name('form.destroy');
});

Route::post('login', [AuthController::class, 'login'])->name('form.login');
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function() {
    // manggil controller sesuai bawaan laravel 8
    Route::post('logout', [AuthController::class, 'logout']);
    // manggil controller dengan mengubah namespace di RouteServiceProvider.php biar bisa kayak versi2 sebelumnya
    Route::post('logoutall',[AuthController::class, 'logoutall']);
});
