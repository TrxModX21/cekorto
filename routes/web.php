<?php

use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SymptonController;
use App\Http\Controllers\User\DiagnoseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/policy/{slug}', [SiteController::class, 'policyPages'])->name('policy.pages');
Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('placeholder-image/{size}', [SiteController::class, 'placeholderImage'])->name('placeholder.image');

Route::get('/maintenance-mode', function () {
    return 'maintenance';
})->name('maintenance');

Route::prefix('diagnose')->as('diagnose.')->group(function () {
    Route::get('/', [DiagnoseController::class, 'index'])->name('index');
    Route::post('/', [DiagnoseController::class, 'diagnose'])->middleware('auth')->name('process');

    Route::middleware('auth')->prefix('history')->group(function () {
        Route::get('/', [DiagnoseController::class, 'history'])->name('history');
        Route::get('/detail/{id}', [DiagnoseController::class, 'historyDetail'])->name('history.detail');
    });
});

Route::get('/sympton-info', [SymptonController::class, 'index'])->name('sympton.info');

Route::get('/disease-info', [DiseaseController::class, 'index'])->name('disease.info');

Route::get('/hospitals', [HospitalController::class, 'index'])->name('hospitals');
Route::get('/api/hospitals', [HospitalController::class, 'getHospitals']);