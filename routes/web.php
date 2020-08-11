<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    if (request()->fullUrl() === redirect()->back()->getTargetUrl()) {
        return redirect('/');
    }
    return redirect()->back();
});
//    Route::get('locale/{locale}', 'UserController@setLocale');


Route::group([
    'namespace' => 'Auth',
], function () {
    // Authentication Routes...

    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    // Registration Routes...
    Route::get('register', 'RegisterController@showRegisterForm')->name('register_page');
    Route::post('register', 'RegisterController@register')->name('register');
//    Route::get('register/activate/{token}', 'RegisterController@confirm')->name('email-confirm');
    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'ResetPasswordController@reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    Route::get('password/rest/{token}', 'ResetPasswordController@showResetForm')->name('password-rest');
});

Route::get('/', 'UserController@index')->name('dashboard');
Route::get('/home', 'UserController@index')->name('dashboard');
Route::get('/dashboard', 'UserController@index')->name('dashboard');


