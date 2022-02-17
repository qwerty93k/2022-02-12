<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('task')->group(function () {
    Route::get('', 'App\Http\Controllers\TaskController@index')->name('task.index');
    //Route::get('bookfilter', 'App\Http\Controllers\BookController@bookfilter')->name('book.bookfilter');
    //Route::get('indexpagination', 'App\Http\Controllers\BookController@indexpagination')->name('book.indexpagination');
    //Route::get('indexsortfilter', 'App\Http\Controllers\BookController@indexsortfilter')->name('book.indexsortfilter');
    //Route::get('indexsortable', 'App\Http\Controllers\BookController@indexsortable')->name('book.indexsortable');
    //Route::get('search', 'App\Http\Controllers\AuthorController@search')->name('author.search');
    Route::get('indexfilter', 'App\Http\Controllers\TaskController@indexfilter')->name('task.indexfilter');
    Route::get('indexsortable', 'App\Http\Controllers\TaskController@indexsortable')->name('task.indexsortable');
});
