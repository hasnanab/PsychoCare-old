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
    return view('landing_page');
});

Route::get('/login', 'UserController@login');
Route::post('/login/action', 'UserController@loginAction');

Route::get('/signup', 'UserController@signup');
Route::post('/signup/action', 'UserController@signupAction');

//Psikiater
Route::get('/psikiater', 'PsikiaterController@index');
Route::get('/psikiater/profil', 'PsikiaterController@profil');
Route::post('/profil/{id}/psikiater/update', 'PsikiaterController@editProfilSave');
Route::get('/edit/profil/psikiater', 'PsikiaterController@formEdit');
//Pasien
Route::get('/pasien', 'PasienController@index');
Route::get('/pasien/cariPsikiater', 'PasienController@cariPsikiater');
Route::get('/search/psikiater', 'PasienController@search');
Route::get('/chat/psikiater/{id}', 'MessageController@index');
Route::post('/sendMessage', 'MessageController@sendMessage');
Route::get('/mappingChat', 'MessageController@mappingChat');
Route::get('/pasien/profil', 'PasienController@profil');
Route::post('/profil/{id}/update', 'PasienController@editProfilSave');
Route::get('/edit/profil', 'PasienController@formEdit');

//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/add-psikeater', function () {
    return view('add_psikiater');
});
Route::post('/admin/add_psikiater/save', 'AdminController@add_Psikiater');
Route::get('/admin/profil', 'AdminController@profil');
Route::post('/profil/{id}/admin/update', 'AdminController@editProfilSave');
Route::get('/edit/profil/admin', 'AdminController@formEdit');

Route::get('/signout', 'PsikiaterController@signOut');
Route::get('/sign-out', 'PasienController@signOut');
