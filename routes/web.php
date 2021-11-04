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

Route::get('/', 'HomeController@inicio');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/entrar', 'AuthController@entrar');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('auth/login');
// });

// Auth::routes();

Route::resource('categoria', 'CategoriaController');
Route::resource('conteudo', 'ConteudoController');
Route::resource('icone', 'IconeController');
});