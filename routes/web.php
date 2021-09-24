<?php

use App\Exports\ClientsExport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::post('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('/clients', [\App\Http\Controllers\Admin\GuiController::class, 'getClientsCsv'])->name('get_clients_csv');
    Route::get('/specialists', [\App\Http\Controllers\Admin\GuiController::class, 'getSpecialistsCsv'])->name('get_specialists_csv');
});

//Route::any('/', function () { return response()->json('ok'); });

