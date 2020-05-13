<?php

use App\Events\FormSubmitted;
use App\Events\FormSubmitted2;
use App\Events\WebsocketDemoEvent;
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
    broadcast(new WebsocketDemoEvent('some_data'));
    return view('landing_page');
});

Route::get('/login', 'UserController@login');
Route::post('/login/action', 'UserController@loginAction');

Route::get('/signup', 'UserController@signup');
Route::post('/signup/action', 'UserController@signupAction');
Route::get('/reset/password', function () {
    return view('form-reset-pass');
});
Route::post('/reset/password/input', 'UserController@prosesInputEmail');
//Psikiater
Route::get('/psikiater', 'PsikiaterController@index');
Route::get('/psikiater/profil', 'PsikiaterController@profil');
Route::post('/profil/{id}/psikiater/update', 'PsikiaterController@editProfilSave');
Route::get('/edit/profil/psikiater', 'PsikiaterController@formEdit');
Route::get('/history/chat', 'PsikiaterController@viewHistoryChat');
Route::get('/chat/user/{id}', 'MessageController@historyChat');

//Pasien
Route::get('/pasien', 'PasienController@index');
Route::get('/pasien/cariPsikiater', 'PasienController@cariPsikiater');
Route::get('/search/psikiater', 'PasienController@search');
Route::get('/chat/psikiater/{id}', 'MessageController@index');
Route::post('/sender', 'MessageController@sendMessage');
Route::get('/mappingChat', 'MessageController@mappingChat');
Route::get('/pasien/profil', 'PasienController@pasienProfil');
Route::post('/profil/{id}/update', 'PasienController@editPasienProfilSave');
Route::get('/edit/profil', 'PasienController@formEditPasien');

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

Route::get('/chat', function () {
    broadcast(new WebsocketDemoEvent('some_data'));
    return view('chat');
})->middleware(\App\Http\Middleware\Cors::class);

Route::get('/psikiater/chat/{id}', 'ChatController@index');
Route::get('/messages', 'ChatController@fetchMessages');
Route::post('/messages', 'ChatController@sendMessage');


//PUSHER
Route::get('/counter' , function (){
   return view('counter');
});
Route::get('/sender' , function (){
    return view('sender');
});
//Route::post('/sender' , function (){
//   //this is a post
////    ngambil dari __countruct
//    $chat = request()->chat;
////    FormSubmitted => Event
//    event(new FormSubmitted($chat));
//});

