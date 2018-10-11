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

Route::get('/', [
    'uses'=>'PeopleController@index',
    'as'=>'resumes'
]);
Route::get('/search', [
    'uses'=>'PeopleController@index',
    'as'=>'resumes'
]);
Route::get('/create', [
    'uses'=>'PeopleController@create',
    'as'=>'resume.create'
]);
Route::post('/store', [
    'uses'=>'PeopleController@store',
    'as'=>'resume.store'
]);
Route::post('/search', [
    'uses'=>'PeopleController@search',
    'as'=>'resume.search'
]);
