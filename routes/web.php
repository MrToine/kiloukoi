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
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'doregister']);
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'dologin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/announce/create', [\App\Http\Controllers\AnnounceController::class, 'create'])->middleware('auth')->name('announce.create');
Route::post('/announce/create', [\App\Http\Controllers\AnnounceController::class, 'store'])->middleware('auth')->name('announce.store');

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
