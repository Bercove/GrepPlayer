<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleLogin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\Dashboard\AlbumController;
use App\Http\Controllers\Auth\Dashboard\ArtistController;
use App\Http\Controllers\Auth\Dashboard\SearchController;
use App\Http\Controllers\Auth\Dashboard\LastFmController;
use App\Http\Controllers\Auth\Dashboard\ProfileController;
use App\Http\Controllers\Auth\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::name('auth.')->prefix('auth/')->middleware(['guest'])->group(function(){
    Route::name('google.')->prefix('google/')->group(function () {
        Route::get('', [
            GoogleLogin::class, 'redirectToGoogle'
        ])->name('redirect');
        Route::get('callback', [
            GoogleLogin::class, 'handleGoogleCallback'
        ])->name('callback');
    });
});

Route::name('dashboard.')->prefix('dashboard/')->middleware(['auth'])->group(function (){
    // ! Password Management
	Route::name('password.')->prefix('password/rest/')->group(function () {
		Route::post('send', [
            ResetPasswordController::class, 'reset'
        ])->name('reset');
    });

    Route::get('', [
        DashboardController::class, 'Index'
    ])->name('index');

    Route::name('profile.')->prefix('profile/')->group(function (){
        Route::get('', [
            ProfileController::class, 'profile'
        ])->name('index');
        Route::get('edit', [
            ProfileController::class, 'edit'
        ])->name('edit');
        Route::post('information', [
            ProfileController::class, 'information'
        ])->name('information');
    });

    Route::name('last-fm.')->prefix('last-fm/')->group(function () {
        Route::get('callback', [
            LastFmController::class, 'handleCallback'
        ])->name('callback');

        Route::name('search.')->prefix('search/')->group(function () {
            Route::get('', [
                SearchController::class, 'show'
            ])->name('show');
        });

        Route::name('artist.')->prefix('artist/')->group(function () {
            Route::get('', [
                ArtistController::class, 'show'
            ])->name('show');
            Route::get('favorite', [
                ArtistController::class, 'getFavoriteArtist'
            ])->name('favorite');
            Route::post('favorite', [
                ArtistController::class, 'store'
            ])->name('save');
            Route::post('favorite/destroy', [
                ArtistController::class, 'destroy'
            ])->name('destroy');
        });

        Route::name('album.')->prefix('album/')->group(function () {
            Route::get('', [
                AlbumController::class, 'show'
            ])->name('show');
            Route::get('favorite', [
                AlbumController::class, 'getFavoriteAlbum'
            ])->name('favorite');
            Route::post('favorite', [
                AlbumController::class, 'store'
            ])->name('save');
            Route::post('favorite/destroy', [
                AlbumController::class, 'destroy'
            ])->name('destroy');
        });

        Route::name('album.')->prefix('album/')->group(function () {
            Route::get('', [
                AlbumController::class, 'show'
            ])->name('show');
        });
    });
});

Route::get('', [LoginController::class, 'showLoginForm'])->name('home');
