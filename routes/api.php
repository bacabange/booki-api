<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| http://apiato.io/getting-started/installation/#Development-Environment
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {
    Route::get('user/books', 'UserController@listBooks');
    Route::get('user/profile', 'UserController@profile');
    Route::patch('user/profile', 'UserController@updateProfile');

    Route::post('books/{book}/stories', 'BookController@createStory');
    Route::post('books/', 'BookController@store');
    Route::patch('books/{book}', 'BookController@update');

    Route::get('user/book/{book}/stories', 'StoryController@listUserBookStories');
});
