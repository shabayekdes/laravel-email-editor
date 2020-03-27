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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');

Route::get('api/email/{template}/show', 'MailTemplateController@show');
Route::get('api/emails', 'MailTemplateController@index');
Route::post('api/email/create', 'MailTemplateController@send');
