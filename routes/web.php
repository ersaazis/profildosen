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


Auth::routes(['verify' => true, 'register' => false]);

Route::get('/', 'Profil@index')->name('home');

Route::get('/profil-uin', 'Profil@profilUIN')->name('profil UIN');

Route::get('/programstudi/{id}/{nama_ps?}', 'Profil@profilProgramStudi')->name('Profil Program Studi');
Route::get('/programstudi', 'Profil@programStudi')->name('Program Studi');

Route::get('/dosen/{id}/{nama_d?}', 'Profil@profilDosen')->name('Profil Dosen');
Route::get('/dosen', 'Profil@dosen')->name('Dosen');

Route::get('/search', 'Profil@search')->name('search');
Route::post('/search', 'Profil@search')->name('search');

Route::get('/importdata', 'ScrapingForlap@index')->name('importdata');

Route::get('/home',	'WebConfigController@index')->name('homeUser');
Route::post('/config', 'WebConfigController@saveData')->name('config.status');

