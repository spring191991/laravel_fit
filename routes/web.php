<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', [ ServiceController::class, 'index' ])->name('services');
Route::get('services/show/{id}', [ ServiceController::class, 'show' ])->name('services.show');

Route::get('category/{category:slug}', [ServiceController::class, 'category'])
    ->name('category');

Route::get('/articles', [ ArticleController::class, 'index' ])->name('articles');
Route::get('articles/show/{id}', [ ArticleController::class, 'show' ])->name('articles.show');

Route::get('tag/{tag:slug}', [ArticleController::class, 'tag'])
    ->name('tag');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * Панель управления: CRUD-операции над постами, категориями, тегами
 */
Route::group([
    'as' => 'admin.', // имя маршрута, например admin.index
    'prefix' => 'admin', // префикс маршрута, например admin/index
    'namespace' => 'App\Http\Controllers\Admin', // пространство имен контроллеров
    'middleware' => ['auth'] // один или несколько посредников
], function () {
    /*
     * CRUD-операции над постами блога
     */
    Route::resource('article',  'ArticleController', ['except' => ['show']]);
    Route::resource('service',  'ServiceController', ['except' => ['show']]);
    Route::resource('category', 'CategoryController', ['except' => 'show']);
    Route::resource('tag', 'TagController', ['except' => 'show']);
    Route::resource('user', 'UserController', ['except' => ['create', 'store', 'show', 'destroy']]);
});