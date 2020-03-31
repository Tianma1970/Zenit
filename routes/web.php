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
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('news/show', 'NewsController@show');




/**
 * Routes for member
 *  */


Route::group(['middleware'  => 'App\Http\Middleware\MemberMiddleware'], function()
{
    Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');

    Route::post('/projects', 'ProjectController@store');
    Route::get('/projects/create', 'ProjectController@create');
    Route::get('/middleware', 'ProjectController@show');
    Route::get('/motto/create', 'MottoController@create');
    Route::post('/motto', 'MottoController@store');
});

/**
 * Routes for admin
 */

Route::group(['middleware'  => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::match(['get', 'post'], '/adminOnlyPage/', 'HomeController@admin');
    Route::resource('/courses', 'CourseController');
    Route::post('/courses', 'CourseController@store');
    Route::get('/courses/create', 'CourseController@create');
    Route::get('/courses/{course}/edit', 'CourseController@edit');
    Route::resource('/news', 'NewsController');
    Route::post('/update', 'NewsController@update');

    Route::get('projects/comment', 'ProjectController@createComment');
    Route::put('/project/', 'ProjectController@storeComment');

    //Route::get('/register', 'Auth/RegisterController@getRegister');

    Route::get('uploadLogo', 'SettingController@index');
    Route::post('/uploadLogo', 'SettingController@uploadLogo');

    Route::post('/programs', 'ProgramController@store');
    Route::get('programs/create', 'ProgramController@create');
});

/**
 * AUTH ROUTES in general
 * */

Route::middleware(['auth'])->group(function(){
    Route::get('/courses/{course}', 'CourseController@show');
    //uploading profile picture
    Route::get('/upload', 'ProfilePictureController@index');
    Route::post('/store', 'ProfilePictureController@store');
    Route::get('comments/show', 'CommentController@show');
});

