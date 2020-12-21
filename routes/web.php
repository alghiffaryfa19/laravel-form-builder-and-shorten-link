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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('generate-shorten-link', 'ShortLinkController@index')->name('shortlink');
Route::post('generate-shorten-link', 'ShortLinkController@store')->name('generate.shorten.link.post');
Route::get('generate-shorten-link/destroy/{id}', 'ShortLinkController@destroy')->name('shortlink.hapus');
   
Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');
