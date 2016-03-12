<?php
/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
  | Do not use middleware logic here like $errors => you will get error variable is not defined
 */
 

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    // redefine landing page here to get middleware logic working
    // variable like $errors would not be defined
    Route::get('/', 'ElectionController@index');

    // routes Election
    Route::get('/election', 'ElectionController@index');
    Route::post('/ajax/election', 'ElectionController@storeAjax');
    Route::post('/election', 'ElectionController@store');

    // route report
    Route::get('/report', 'ReportController@index');

    // route pictures
    Route::get('/pictures', 'PictureController@index');
    Route::post('/picture', 'PictureController@store');
});
