<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();



Route::get('/questions/{question}', 'QAController@show');


Route::get('/', 'QAController@index');

Route::get('/ask', 'QAController@ask');

Route::get('/profile' , 'UserController@profile');





//Route::get('/login', 'UserController@loginview');
//
//Route::post('/signup', 'UserController@signup');
//
//Route::post('/signin', 'UserController@signin');


Route::post('/questions/upload', 'QAController@upload');


Route::post('/questions/', 'QAController@addQ');

Route::post('/questions/{question}/answers', 'AnswersController@showans');


Route::get('answers/{answer}/edit', 'AnswersController@edit');

Route::patch('answers/{answer}', 'AnswersController@update');

//Route::get('/logout', 'UserController@logout');