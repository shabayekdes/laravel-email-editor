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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/app/{path}', 'HomeController@mails')->where('path', '([A-z\d-\/_.]+)?');

Route::get('api/emails', 'MailTemplateController@index');
Route::post('api/email/create', 'MailTemplateController@send');
Route::get('api/email/{template}/show', 'MailTemplateController@show');
Route::put('api/email/{template}/update', 'MailTemplateController@update');
