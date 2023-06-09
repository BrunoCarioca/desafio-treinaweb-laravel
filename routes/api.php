<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuscaLocalController;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\ObjetoImageController;
use App\Http\Controllers\UpdateImageLocalController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/locais', [LocaisController::class, 'store'])->name('locais.store');
Route::get('/locais', [LocaisController::class, 'index'])
    ->middleware(['auth:api'])
    ->name('locais.index');
Route::post('/locais/imagem', UpdateImageLocalController::class)
    ->middleware(['auth:api'])
    ->name('locais.img');

Route::get('/locais/busca', [BuscaLocalController::class, 'listLocalByName'])->name('locais.busca');
Route::get('/locais/{local}/objetos', [BuscaLocalController::class, 'showLocalObjects'])->name('locais.busca.id');

Route::middleware(['auth:api'])->group(function() {
    Route::get('objetos', [ObjetoController::class, 'index'])->name('objetos.index');
    Route::post('objetos', [ObjetoController::class, 'store'])->name('objetos.store');
    Route::post('objetos/{objeto}/imagem', ObjetoImageController::class)->name('objetos.img');
    Route::get('objetos/{objeto}', [ObjetoController::class, 'show'])->name('objetos.show');
    Route::put('objetos/{objeto}', [ObjetoController::class, 'update'])->name('objetos.update');
    Route::delete('objetos/{objeto}', [ObjetoController::class, 'destroy'])->name('objetos.destroy');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
});
