<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeveloperController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectSliderController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\TypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/' , [DashboardController::class , 'index'])->name('dashboard');

    /**
     * profile routes
     */
    Route::prefix('profile')->name('profile.')->group(function ()
    {
        Route::get('/' , [ProfileController::class , 'index'])->name('index');
        Route::put('/update' , [ProfileController::class , 'update'])->name('update');
    });

    /**
     * types routes
     */
    Route::resource('types' , TypeController::class)->only('index' , 'store' , 'edit' , 'update' , 'destroy');
    Route::post('/types/{id}/restore' , [TypeController::class , 'restore'])->name('types.restore');

    /**
     * statuses routes
     */
    Route::resource('statuses' , StatusController::class)->only('index' , 'store' , 'edit' , 'update' , 'destroy');
    Route::post('/statuses/{id}/restore' , [StatusController::class , 'restore'])->name('statuses.restore');

    /**
     * locations routes
     */
    Route::resource('locations' , LocationController::class)->only('index' , 'store' , 'edit' , 'update' , 'destroy');
    Route::post('/locations/{id}/restore' , [LocationController::class , 'restore'])->name('locations.restore');

    /**
     * developers routes
     */
    Route::resource('developers' , DeveloperController::class)->only('index' , 'create' , 'store' , 'edit' , 'update' , 'destroy');
    Route::post('/developers/{id}/restore' , [DeveloperController::class , 'restore'])->name('developers.restore');

    /**
     * Projects routes
     */
    Route::resource('projects' , ProjectController::class)->only('index' , 'create' , 'store' , 'edit' , 'update' , 'destroy');
    Route::post('/projects/{id}/restore' , [ProjectController::class , 'restore'])->name('projects.restore');

    /**
     * project slider routes 
     */
    Route::prefix('projects/slider')->name('projects.slider.')->group(function (){
        Route::get('/{id}' , [ProjectSliderController::class , 'index'])->name('index');
        Route::post('/store/{id}' , [ProjectSliderController::class , 'store'])->name('store');
        Route::get('/edit/{id}' , [ProjectSliderController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [ProjectSliderController::class , 'update'])->name('update');
        Route::delete('/destroy/{id}' , [ProjectSliderController::class , 'destroy'])->name('destroy');
    });
});
