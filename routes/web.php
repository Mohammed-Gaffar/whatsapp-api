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
    return view('welcome');
});

Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('advertisement/{marketer_slug}', 'UserController@advertisement')->name('marketers.advertisement');

Route::middleware(['auth'])->group(function () {

/* marketers Routes*/
Route::get('marketers', 'UserController@index')->name('marketers');
Route::get('marketers/create', 'UserController@create')->name('marketers.create');
Route::post('marketers/store', 'UserController@store')->name('marketers.store');
Route::get('marketers/edit/{marketer}', 'UserController@edit')->name('marketers.edit');
Route::post('marketers/update/{marketer}', 'UserController@update')->name('marketers.update');
Route::get('marketers/delete/{marketer}', 'UserController@destroy')->name('marketers.delete');


/* customers Routes*/
Route::get('customers', 'CustomerController@index')->name('customers');
Route::post('customers/store', 'CustomerController@store')->name('customers.store');

});

