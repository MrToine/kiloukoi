<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

//accueil
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('website.index');

// membre
Route::get('user/register', [\App\Http\Controllers\AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('user/register', [\App\Http\Controllers\AuthController::class, 'doregister']);
Route::get('user/validation/{token}', [\App\Http\Controllers\AuthController::class, 'validation'])
    ->middleware('guest')
    ->name('user.validation_account');

Route::get('user/{id}', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest')->name('user.profile');

Route::get('user/login', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('user/login', [\App\Http\Controllers\AuthController::class, 'dologin']);
Route::delete('user/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/announce/create', [\App\Http\Controllers\AnnounceController::class, 'create'])->middleware('auth')->name('announce.create');
Route::post('/announce/create', [\App\Http\Controllers\AnnounceController::class, 'store'])->middleware('auth')->name('announce.store');

Route::prefix('user/account')->name('account.')
    ->middleware(['auth', 'role:user|admin'])
    ->group(function () {
    Route::get('/', [\App\Http\Controllers\AccountController::class, 'index'])->name('index');

    Route::get('/messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{announce_id}', [\App\Http\Controllers\MessageController::class, 'show'])->name('messages.show');

    Route::get('/announces', [\App\Http\Controllers\AccountController::class, 'announces'])->name('announces');

    Route::get('/rents', [\App\Http\Controllers\AccountController::class, 'rents'])->name('rents');
    Route::get('/rents/requests', [\App\Http\Controllers\AccountController::class, 'rent_request'])->name('rents.request');
    Route::delete('/rents/request/validation/{location_request}', [\App\Http\Controllers\AccountController::class, 'request_validated'])->name('request.validated');
    Route::delete('/rents/request/destroy/{location_request}', [\App\Http\Controllers\AccountController::class, 'request_destroy'])->name('request.destroy');
});

// Annonces
Route::get('announce', [\App\Http\Controllers\AnnounceController::class, 'index'])->name('announce.index');
Route::get('announce/{slug}-{announce}', [\App\Http\Controllers\AnnounceController::class, 'show'])->name('announce.show')->where([
    'announce' => $idRegex,
    'slug' => $slugRegex
]);
Route::post('announce/{announce}', [\App\Http\Controllers\AnnounceController::class, 'contact'])->name('announce.contact')->where([
    'announce' => $idRegex
]);

// Admin
Route::prefix('admin')->name('admin.')
    ->middleware(['role:admin'])
    ->group(function () {
    Route::resource('announce', \App\Http\Controllers\Admin\AnnounceController::class)->except(['show']);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
    Route::resource('option', \App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});
