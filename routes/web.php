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
Route::get('mainPage', function () {
    return view('mainPage');
	
});

Route::get('/', function () {
    return redirect('login');
});


Route::get('login', function () {
    return view('auth.login');

});

Route::get('register', function () {
    return view('auth.register');
});

Route::get('books-new', function () {
    return view('books.books-new');

});

Route::get('books-edit', function () {
    return view('books.books-edit');

});




Route::post('/registeraction','RegisterController@store');
Route::post('/loginaction','RegisterController@login');
Route::resource('books','booksController');
Route::get('/logout','RegisterController@logout');