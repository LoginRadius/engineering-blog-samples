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

Route::get('/login',function () {
    return view('login');
});

Route::post('/login','AuthController@login');

Route::get('/register',function () {
    return view('register');
});

Route::post('/register','AuthController@register');

Route::get('/logout',function(){
    // clear the session...
    session([
        'access_token' => null,
        'logged_in_user' => null
    ]);
    // redirect to login page...
    return redirect('login');
});

Route::get('/dashboard',function () {
    $loggedInUser = session('logged_in_user');
    if($loggedInUser){
        $user = array(
            'name' => $loggedInUser->FullName
        );
        return view('dashboard')->with('user',$user);
    }else{
        return redirect('login')->with('status', 'You must be logged in.');
    }
});