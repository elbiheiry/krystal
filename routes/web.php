<?php

use App\Http\Controllers\Site\Auth\ForgotPasswordController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Auth\ResetPasswordController;
use App\Http\Controllers\Site\DeveloperController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\LocationController;
use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\StepsController;
use App\Http\Controllers\Site\TypeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{

    // Authentication Routes...
    Route::get('login', [LoginController::class , 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class , 'login']);
    Route::post('logout', [LoginController::class , 'logout'])->name('logout');

    // Registration Routes...
    Route::get('register', [RegisterController::class , 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class , 'register']);

    // Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class , 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class , 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class , 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class , 'reset'])->name('password.update');

    //social login routes..
    Route::post('/facebook-login/{provider}' , [LoginController::class , 'facebook_login'])->name('login.facebook');
    Route::get('/social-login//{provider}', [LoginController::class , 'redirectToProvider'])->name('login.redirect');
    Route::get('/social-login/{provider}/callback', [LoginController::class , 'handleProviderCallback'])->name('login.callback');

    
    Route::get('/' , [HomeController::class , 'index'])->name('index')->middleware('user_session');
    Route::get('/search' , [HomeController::class , 'search'])->name('search');

    Route::get('/welcome' , [StepsController::class , 'welcome'])->name('welcome');
    Route::post('/first-validation' , [StepsController::class , 'first_validation'])->name('first_validation');
    Route::post('/second-validation' , [StepsController::class , 'second_validation'])->name('second_validation');
    Route::post('/third-validation' , [StepsController::class , 'third_validation'])->name('third_validation');
    Route::post('/fourth-validation' , [StepsController::class , 'fourth_validation'])->name('fourth_validation');
    Route::post('/store' , [StepsController::class , 'store'])->name('store');

    Route::get('/developers' , [DeveloperController::class , 'index'])->name('developers');
    Route::get('/developers/{developer}' , [DeveloperController::class , 'show'])->name('developer');

    Route::get('/locations/{location}' , [LocationController::class , 'index'])->name('location');

    Route::get('/project-types/{type}' , [TypeController::class , 'index'])->name('type');

    Route::get('/projects/{project}' , [ProjectController::class , 'index'])->name('project');
    Route::post('/projects/{id}/store' , [ProjectController::class , 'store'])->name('project.store');
});