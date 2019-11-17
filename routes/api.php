<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jobs/{id}', 'JobsController@getJobs')->name('api-userjobs');

Route::get('/user/{id}', 'UserController@getUser')->name('api-userdata');
Route::get('/users', 'UserController@getUsers')->name('api-users');
Route::get('/user-role/{id}', 'UserController@getUserRole')->name('api-userrole');

Route::get('users/it', 'UserController@getITUsers')->name('api-it-users');
Route::get('users/marketing', 'UserController@getMarketingUsers')->name('api-marketing-users');
Route::get('users/vanzari', 'UserController@getVanzariUsers')->name('api-vanzari-users');

Route::get('/user-roles', 'UserController@getUsersRoles')->name('api-userroles');

Route::get('/events', 'EventController@getEvents')->name('api-events');
Route::get('/event-attendance', 'EventController@getEventsAttendance')->name('api-events-attendance');