<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdhesionFormationController;
use App\Http\Controllers\AdhesionInscriptionController;
use App\Http\Controllers\AdhesionPaiementController;
use App\Http\Controllers\AdhesionStageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\MembreController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Verify Email
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Evenements


Route::resource('evenements', EvenementController::class);
Route::resource('activities', ActivityController::class);
Route::resource('annonces', AnnonceController::class);

Route::get('/adhesion-formations', [AdhesionFormationController::class, 'index'])->name('adhesion-formations');

Route::get('/adhesion-inscriptions', [AdhesionInscriptionController::class, 'index'])->name('adhesion-inscription');

Route::get('/adhesion-stage', [AdhesionStageController::class, 'index'])->name('adhesion-stage');

Route::get('/adhesion-paiement', [AdhesionPaiementController::class, 'index'])->name('adhesion-paiement');

Route::resource('members', MembreController::class);



