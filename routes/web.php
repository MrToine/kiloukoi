<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

use Tabuna\Breadcrumbs\Trail;

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

/* Breadcrumb admin */
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Home', route('website.index'));
    $trail->push('Administration', route('admin.home'));
});

//Annonces
Breadcrumbs::for('admin.announce.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Annonces', route('admin.announce.index'));
});
Breadcrumbs::for('admin.announce.create', function ($trail) {
    $trail->parent('admin.announce.index');
    $trail->push('Créer une annonce', route('admin.announce.create'));
});

//Categories
Breadcrumbs::for('admin.category.index', function ($trail) {
    $trail->parent('admin.announce.index');
    $trail->push('Catégories', route('admin.category.index'));
});
Breadcrumbs::for('admin.category.create', function ($trail) {
    $trail->parent('admin.category.index');
    $trail->push('Créer une catégorie', route('admin.category.create'));
});

//Options
Breadcrumbs::for('admin.option.index', function ($trail) {
    $trail->parent('admin.announce.index');
    $trail->push('Options', route('admin.option.index'));
});
Breadcrumbs::for('admin.option.create', function ($trail) {
    $trail->parent('admin.option.index');
    $trail->push('Créer une option', route('admin.option.create'));
});

/* Breadcrumbs account */
Breadcrumbs::for('account.mypage', function ($trail) {
    $trail->push('Home', route('website.index'));
    $trail->push('Mon Compte', route('account.mypage'));
});
Breadcrumbs::for('account.announces', function ($trail) {
    $trail->parent('account.mypage');
    $trail->push('Mes annonces', route('account.announces'));
});
Breadcrumbs::for('account.rents', function ($trail) {
    $trail->parent('account.mypage');
    $trail->push('Mes Locations en cours', route('account.rents'));
});
Breadcrumbs::for('account.rents.request', function ($trail) {
    $trail->parent('account.announces');
    $trail->push('Traiter les demandes', route('account.rents.request'));
});
Breadcrumbs::for('account.rents.close', function ($trail) {
    $trail->parent('account.announces');
    $trail->push('Mettre fin à une location', route('account.rents.close'));
});
Breadcrumbs::for('account.rents.list', function ($trail) {
    $trail->parent('account.announces');
    $trail->push('Listing', route('account.rents.list'));
});
Breadcrumbs::for('account.messages.index', function ($trail) {
    $trail->parent('account.mypage');
    $trail->push('Boîtes à messages', route('account.messages.index'));
});

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

//accueil
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('website.index')
    ->breadcrumbs(fn (Trail $trail) => $trail->push('Home', route('website.index')));

Route::get('/images/{path}', [App\Http\Controllers\PictureController::class, 'show'])->where('path', '.*');

// contact
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'submitForm'])->name('contact.submit');

// membre
Route::get('user/register', [\App\Http\Controllers\AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('user/register', [\App\Http\Controllers\AuthController::class, 'doregister']);
Route::get('user/validation/{token}', [\App\Http\Controllers\AuthController::class, 'validation'])
    ->middleware('guest')
    ->name('user.validation_account');

//Route::get('user/{id}', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest')->name('user.profile');

Route::get('user/recuperation', [\App\Http\Controllers\AuthController::class, 'recuperation_password'])->middleware('guest')->name('recuperation_password');
Route::post('user/recuperation', [\App\Http\Controllers\AuthController::class, 'dorecuperation_password']);
Route::get('user/recuperation/check/{token}', [\App\Http\Controllers\AuthController::class, 'recuperation_password_check'])->middleware('guest')->name('recuperation_password_check');
Route::post('user/recuperation/check/{token}', [\App\Http\Controllers\AuthController::class, 'dorecuperation_password_check']);

Route::get('user/login', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('user/login', [\App\Http\Controllers\AuthController::class, 'dologin']);
Route::delete('user/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/announce/create', [\App\Http\Controllers\AnnounceController::class, 'create'])->middleware('auth')->name('announce.create');
Route::post('/announce/create', [\App\Http\Controllers\AnnounceController::class, 'store'])->middleware('auth')->name('announce.store');

Route::get('/announce/edit/{announce}', [\App\Http\Controllers\AnnounceController::class, 'edit'])->middleware('auth')->name('announce.edit');
Route::put('/announce/edit/{announce}', [\App\Http\Controllers\AnnounceController::class, 'update'])->middleware('auth')->name('announce.update');
Route::delete('/announce/destroy/{announce}', [\App\Http\Controllers\AnnounceController::class, 'destroy'])->middleware('auth')->name('announce.destroy');

Route::prefix('user/account')->name('account.')
    ->middleware(['auth', 'role:user|admin'])
    ->group(function () {
    $idRegex = '[0-9]+';
    Route::get('/', [\App\Http\Controllers\AccountController::class, 'index'])->name('index');

    Route::get('/mypage', [\App\Http\Controllers\AccountController::class, 'mypage'])->name('mypage');

    Route::get('/messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{announce_id}', [\App\Http\Controllers\MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{box_id}', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');

    Route::get('/announces', [\App\Http\Controllers\AccountController::class, 'announces'])->name('announces');
    Route::delete('/picture/{picture}', [\App\Http\Controllers\PictureController::class, 'destroy'])->name('picture.destroy')->where([
        'picture' => $idRegex,
    ]);

    Route::get('/rents', [\App\Http\Controllers\AccountController::class, 'rents'])->name('rents');
    Route::get('/rents/list', [\App\Http\Controllers\AccountController::class, 'rents_list'])->name('rents.list');
    Route::get('/rents/requests', [\App\Http\Controllers\AccountController::class, 'rent_request'])->name('rents.request');
    Route::delete('/rents/request/validation/{location_request}', [\App\Http\Controllers\AccountController::class, 'request_validated'])->name('request.validated');
    Route::get('/rents/close/', [\App\Http\Controllers\AccountController::class, 'close_list'])->name('rents.close');
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

// Avis
Route::get('/reviews/{announce}/create/{token}', [\App\Http\Controllers\ReviewController::class, 'create'])
    ->middleware('auth')
    ->name('reviews.create');
Route::post('/reviews/store', [\App\Http\Controllers\ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('reviews.store');

// Newsletter
Route::get('/newsletter/unfollow/{mail}', [\App\Http\Controllers\NewsletterController::class, 'unfollow'])
    ->name('newsletter.unfollow');
Route::post('/newsletter/unfollow/{mail}', [\App\Http\Controllers\NewsletterController::class, 'dounfollow'])
    ->name('newsletter.unfollow.applicate');

// Admin
Route::prefix('admin')->name('admin.')
    ->middleware(['role:admin'])
    ->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])
        ->name('home');
    Route::get('/announce/{announce}/check_moderation', [\App\Http\Controllers\Admin\AnnounceController::class, 'check_moderation'])
        ->name('announce.check_moderation');
    Route::resource('user', \App\Http\Controllers\AccountController::class)
        ->except(['show']);
    Route::resource('announce', \App\Http\Controllers\Admin\AnnounceController::class)
        ->except(['show']);
    Route::resource('page', \App\Http\Controllers\Admin\PageController::class)
        ->except(['show']);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)
        ->except(['show']);
    Route::resource('option', \App\Http\Controllers\Admin\OptionController::class)
        ->except(['show']);
    Route::resource('newsletter', \App\Http\Controllers\Admin\NewsletterController::class)
        ->except('show');
    Route::get('/newsletter/{newsletter}/send', [\App\Http\Controllers\Admin\NewsletterController::class, 'send'])
        ->name('newsletter.send');
    Route::get('/newsletter_maj', [\App\Http\Controllers\Admin\HomeController::class, 'newsletter_maj'])
        ->name('newsletter_maj');
});

//pages
Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'index'])->name('page.show');
