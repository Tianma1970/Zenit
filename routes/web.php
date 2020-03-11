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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('news/show', 'NewsController@show');

/**
 * AUTH ROUTES
 * Routes for member
 */
Route::group(['middleware'  => 'App\Http\Middleware\MemberMiddleware'], function()
{
    Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');
});

/**
 * Routes for admin
 */
Route::group(['middleware'  => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::match(['get', 'post'], '/adminOnlyPage/', 'HomeController@admin');
    Route::resource('/courses', 'CourseController');
    Route::resource('/news', 'NewsController');
    Route::get('/comments/create', 'CommentController@create');
    Route::get('comments/show', 'CommentController@show');
    Route::post('comments/store', 'CommentController@store');
});

