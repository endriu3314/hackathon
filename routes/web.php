<?php

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
    return view('welcome');
});

Auth::routes();

//oauth
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

//normal routes
Route::get('/home', 'HomeController@index')->name('home');

//loged-in routes
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('app');
    });

    Route::get('/profile/{id}', 'UserController@showProfile')->name('profile');
    Route::get('/user-profil/{id}', 'UserController@showUser')->name('user');

    Route::prefix('user')->group(function () {
        Route::post('update', 'UserController@updateUser')->name('update-user');
    });

    Route::prefix('jobs')->group(function () {
        Route::post('insert', 'JobsController@insertJob')->name('insert-job');
    });

    Route::get('/category/it', 'UserController@showIT')->name('it-category');
    Route::get('/category/marketing', 'UserController@showMarketing')->name('marketing-category');
    Route::get('/category/vanzari', 'UserController@showVanzari')->name('vanzari-category');

    //admin routes
    Route::group(['middleware' => ['role:admin']], function(){
        Route::get('/admin', 'AdminController@index')->name('admin.home');
    });
});



