<?php

use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['web']], function () {

    Route::auth();

	Route::get('/', [
		'as' => 'home', 
		'uses' => 'HomeController@index'
	]);

    Route::get('{username}', 'UsersController@profile');
    
    Route::get('{username}/following', [
        'as' => 'following', 
        'uses' => 'UsersController@following'
    ]);

    Route::get('{username}/followers', [
        'as' => 'followers', 
        'uses' => 'UsersController@followers'
    ]);

    Route::get('who-to-follow/suggestions', [
        'as' => 'peopleToFollow', 
        'uses' => 'UsersController@peopleToFollow'
    ]);

    Route::post('follow', [
    	'as' => 'follow', 
    	'uses' => 'FollowsController@store'
   	]);

     Route::delete('unfollow/{user_id}', [
     	'as' => 'unfollow', 
     	'uses' => 'FollowsController@destroy'
    	]);

    Route::resource('tweets', 'TweetsController', ['only' => ['store']]);

});
