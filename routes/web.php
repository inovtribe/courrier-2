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

/* Route::get('/', function () {
    return view('welcome');
}); */







Route::get('customers', 'CustomersController@list');

Auth::routes();

Route::get('/', 'DashboardController@all')->name('dashboard');

Route::get('mails/all', 'MailsController@list')->name('all_mails');
Route::get('mails/nottreated', 'MailsController@not_treated')->name('not_treated_mails');
Route::get('mails/treated', 'MailsController@treated')->name('treated_mails');
Route::get('mails/archived', 'MailsController@archived')->name('archived_mails');
Route::get('mails/deleted', 'MailsController@deleted')->name('deleted_mails');
Route::get('mails/add', 'MailsController@add')->name('add_mail');
Route::post('mails/add','MailsController@addMail')->name('add_mail_post');

Route::get('contact', 'ContactsController@list')->name('contact');

Route::get('profile', 'UserProfilesController@list')->name('profile');

Route::get('settings', 'SettingsController@list')->name('settings');

Route::get('/home', 'HomeController@index')->name('home');
