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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'BooksController@books'); #at localhost/, we go to the controller...
#...and the controller returns the view 'welcome'
Route::get('/booksByAuthor', 'BooksController@booksByAuthor');

Route::get('/booksByTitle', 'BooksController@booksByTitle');

Route::get('/deleteBook', 'BooksController@deleteBook');

Route::get('/addBookPage', 'BooksController@addBookPage');

Route::post('/addBook', 'BooksController@addBook'); #see newBook in 'other' controller

Route::get('/editBookPage', 'BooksController@editBookPage');#get? post?

Route::post('/editBook', 'BooksController@editBook');

Route::post('/search', 'BooksController@search');#get? post?

Route::get('/export', 'BooksController@export');
Route::get('/exportCSVTA', 'BooksController@exportCSVTA');
Route::get('/exportCSVTitles', 'BooksController@exportCSVTitles');
Route::get('/exportCSVAuthors', 'BooksController@exportCSVAuthors');
Route::get('/exportXMLTA', 'BooksController@exportXMLTA');
Route::get('/exportXMLTitles', 'BooksController@exportXMLTitles');
Route::get('/exportXMLAuthors', 'BooksController@exportXMLAuthors');