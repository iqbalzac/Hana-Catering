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

Route::get('/', function () {
    return redirect()->to('beranda');
});

Auth::routes();

Route::get('/beranda', 'HomeController@index')->name('beranda');
Route::post('/beranda', 'HomeController@store');
Route::get('/menu-satuan', 'SemuaMakananController@index');
Route::get('/menu-paketan', 'MenuPaketanController@index');
Route::get('/pesanan/{id}/batal', 'PesananController@cancel');
Route::resource('/pesanan', 'PesananController');
Route::resource('/ringkasan', 'InvoiceController');
Route::get('/profile', 'profileController@index')->name('profile');