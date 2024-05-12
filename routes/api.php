<?php

use App\Http\Controllers\ContaController;
use Illuminate\Support\Facades\Route;

Route::get('/debug', function () {
    return now()->toString();
});

Route::prefix('conta')->group(function () {
    Route::post('', [ContaController::class, 'store']);
});
