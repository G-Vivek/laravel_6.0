<?php

use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use App\Cognito\CognitoClient;
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

Route::get('sendEmail', function () {
    $job = (new SendEmailJob)->delay(Carbon::now()->addSeconds(10));
    dispatch($job);
    return 'Mail Sent Properly';
});

Route::get('getPara', function () {
	$data['email'] = 'vivek1@gundla.com';
	$data['password'] = 'Vivek@123';
    //$params = app()->make(CognitoClient::class)->getUser($data['email']);
    $params = app()->make(CognitoClient::class)->authenticate($data['email'], $data['password']);
   // $params = app()->make(CognitoClient::class)->resendConfirmationCode($email);
    dd($params);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@index');
Route::get('/users/{id}', 'HomeController@getUser');
