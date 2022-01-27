<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

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
//

Route::get('/', function () {
    if (session()->get('userSession') != null) {
        return redirect('/home');
    } else {
        return redirect('/login');
    }
});
Route::post('/logout', function () {
    session()->remove('userSession');
    session()->remove('userId');
    return redirect('/');
});
Route::resource('/login', 'LoginController');
Route::resource('/register', 'RegisterController');
Route::resource('/home', 'HomeController');
Route::get('/sendEmail', 'MailController@passwordResetEmail');
Route::get('/activationEmail', 'MailController@accountConfirmationEmail');
Route::get('/activateAccount', function(\Illuminate\Http\Request $request){

    $data = ['email_verified_at' => date('Y-m-d H:i:s')];
    $checkActivation = \App\Models\User::query()->where('email_verified_at', '=', null)
        ->where('email', '=', decrypt($request['email']))->count();
    if($checkActivation == 1){
        \App\Models\User::query()->where('email', '=', decrypt($request['email']))->update($data);
        return redirect('/login')->with('success', 'Account activated!');

    }
    $errors = new MessageBag();
    $errors->add('account_activated', 'Account already activated!');

    return redirect('/login')->withErrors($errors);

});
Route::resource('/resetPassword', 'ResetPasswordController');

