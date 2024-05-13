<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\TransacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/debug', function () {
    return now()->toString();
});

Route::prefix('conta')->group(function () {
    Route::get('', [ContaController::class, 'show']);
    Route::post('', [ContaController::class, 'store']);
});

Route::prefix('transacao')->group(function () {
    Route::post('', [TransacaoController::class, 'transferir']);
});
