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

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function (){
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth', 'uses'], function (){

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);
    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);
    Route::group(['prefix' => 'project'], function (){
        Route::get('{id}/note', 'ProjectNotesController@index');
        Route::post('{id}/note', 'ProjectNotesController@store');
        Route::put('{id}/note/{noteId}', 'ProjectNotesController@update');
        Route::delete('{id}/note/{noteId}', 'ProjectNotesController@destroy');
    });

//    Route::get('client', ['uses' => 'ClientController@index']);
//    Route::post('client', 'ClientController@store');
//    Route::get('client/{id}', 'ClientController@show');
//    Route::delete('client/{id}', 'ClientController@destroy');

//    Route::get('project', 'ProjectController@index');
//    Route::post('project', 'ProjectController@store');
//    Route::get('project/{id}', 'ProjectController@show');
//    Route::delete('project/{id}', 'ProjectController@destroy');
});