<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'namespace' => 'Auth',
], function (){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');

});
Route::group([
    'middleware' => [
        'auth:moderator',
    ]
], function (){
    Route::get('/', 'ModeratorController@index')->name('dashboard');
    Route::get('/home', 'ModeratorController@index')->name('dashboard');
    Route::get('/dashboard', 'ModeratorController@index')->name('dashboard');
});

