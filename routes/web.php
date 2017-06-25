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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/companies', 'CompaniesController@index');
Route::get('/companies/{domain}/{company}', 'CompaniesController@show');
Route::get('/companies/create', 'CompaniesController@create');
Route::post('/companies', 'CompaniesController@store');
Route::delete('/companies/{company}', 'CompaniesController@destroy');

Route::get('/companies/{domain}/{company}/portfolio', 'PortfolioController@index');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
