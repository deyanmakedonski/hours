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

Route::get('/home', 'HomeController@getHome');
Route::get('/',function(){
    return redirect('/home');
});

Route::controllers([
    'account' => 'Auth\AuthController',
    'lock-screen' => 'LockScreenController',
    'avatar/{id}' => 'AvatarController',
    'accounts' => 'AccountController',
    'calendar' => 'CalendarController'
]);

Route::post('/test',function(){
    try{
        $user = \App\User::findOrFail(\Request::input('id'));
        return \Response::json($user,200);
    }catch(\Exception $e){
        return \Response::json($e->getMessage(),200);
    }
});