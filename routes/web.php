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
 * Routes for member
 *  */


Route::group(['middleware'  => 'App\Http\Middleware\MemberMiddleware'], function()
{
    Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');

    Route::resource('/projects', 'ProjectController');
});

/**
 * Routes for admin
 */

Route::group(['middleware'  => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::match(['get', 'post'], '/adminOnlyPage/', 'HomeController@admin');
    Route::post('/courses', 'CourseController@store');
    Route::get('/courses/create', 'CourseController@create');
    Route::get('/courses/{course}/edit', 'CourseController@edit');
    Route::resource('/news', 'NewsController');
    Route::post('/update', 'NewsController@update');
    Route::get('/comments/create', 'CommentController@create');
    Route::get('comments/show', 'CommentController@show');
    Route::post('comments/store', 'CommentController@store');
});

/**
 * AUTH ROUTES in general
 * */

Route::middleware(['auth'])->group(function(){
    Route::get('/courses/{course}', 'CourseController@show');
    //uploading profile picture
    Route::get('/upload', 'ProfilePictureController@index');
    Route::post('/store', 'ProfilePictureController@store');
});

