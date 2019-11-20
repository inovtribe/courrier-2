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








Auth::routes();
Route::get('customers', 'CustomersController@list');

Route::get('/', 'DashboardController@all')->name('dashboard');

// Route::get('mails/all', 'MailsController@list')->name('all_mails');
// Route::get('mails/nottreated', 'MailsController@not_treated')->name('not_treated_mails');
// Route::get('mails/treated', 'MailsController@treated')->name('treated_mails');
// Route::get('mails/archived', 'MailsController@archived')->name('archived_mails');
// Route::get('mails/deleted', 'MailsController@deleted')->name('deleted_mails');
// Route::get('mails/add', 'MailsController@add')->name('add_mail');
// Route::post('mails/add','MailsController@addMail')->name('add_mail_post');

Route::get('courrier/all/arrived', 'CourrierController@listArrived')->name('all_mails_arrived');
Route::get('courrier/single/{mail}/arrived','CourrierController@showArrived')->name('single_arrived_mail');
Route::get('courrier/add/arrived', 'CourrierController@addArrived')->name('add_arrived_mail');
Route::get('courrier/all/outgoing', 'CourrierController@listOutgoing')->name('all_mails_outgoing');
Route::get('courrier/single/{mail}/outgoing','CourrierController@showOutgoing')->name('single_outgoing_mail');
Route::get('courrier/add/outgoing', 'CourrierController@addOutgoing')->name('add_outgoing_mail');
Route::get('courrier/all/internal', 'CourrierController@listInternal')->name('all_mails_internal');
Route::get('courrier/single/{mail}/internal','CourrierController@showInternal')->name('single_internal_mail');
Route::get('courrier/add/internal', 'CourrierController@addInternal')->name('add_internal_mail');
Route::get('courrier/nottreated', 'CourrierController@not_treated')->name('not_treated_mails');
Route::get('courrier/treated', 'CourrierController@treated')->name('treated_mails');
Route::get('courrier/archived', 'CourrierController@archived')->name('archived_mails');
Route::get('courrier/deleted', 'CourrierController@deleted')->name('deleted_mails');
Route::get('courrier/add', 'CourrierController@add')->name('add_mail');
Route::post('courrier/add','CourrierController@addMail')->name('add_mail_post');
Route::get('courrier/single/{mail}','CourrierController@show')->name('single_mail');
Route::patch('courrier/single/{mail}/forward', 'CourrierController@forward')->name('forward_mail');

Route::get('contact', 'ContactsController@list')->name('contact');
Route::get('contact/add', 'ContactsController@add')->name('add_contact');
Route::post('contact/add', 'ContactsController@addContact')->name('add_contact_post');

Route::get('services', 'ServicesController@list')->name('services');
Route::get('services/add', 'ServicesController@add')->name('add_services');
Route::post('services/add', 'ServicesController@addService')->name('add_services_post');

Route::get('types', 'TypesController@list')->name('types');
Route::get('types/add', 'TypesController@add')->name('add_types');
Route::post('types/add', 'TypesController@addType')->name('add_types_post');

Route::get('profile', 'UserProfilesController@list')->name('profile');

Route::get('settings', 'SettingsController@list')->name('settings');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
