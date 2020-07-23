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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // return view('welcome');
    if (Auth::check()) {
        return redirect('home');
    } else {
        return redirect('login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
	Route::match(['get', 'post'],'/get-data','UserController@getData');
    Route::get('/create',['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::match(['get','post'],'/store','UserController@store');
    Route::match(['get','post'],'/update','UserController@update');
	Route::match(['get', 'post'],'/check-username','UserController@checkUsername');
	Route::match(['get', 'post'],'/check-email','UserController@checkEmail');
	Route::match(['get', 'post'],'/{id}/reset','UserController@reset');
    Route::match(['get', 'post'],'/{id}/nonaktifkan','UserController@nonaktifkan');
    Route::match(['get', 'post'],'/{id}/aktifkan','UserController@aktifkan');
	Route::match(['get', 'post'],'/edit/{id}','UserController@edit');
	Route::get('/{id}/delete', 'UserController@destroy');
});

Route::prefix('activity-log')->group(function() {
    Route::get('/', 'ActivityLogController@index');
    Route::match(['get', 'post'],'/get-data','ActivityLogController@getData');
});
