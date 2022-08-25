<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

use App\Http\Controllers\FrontController;
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
Route::get('/list', function () {
    return view('list');
});
Route::get('/navbar', function () {
    return view('navbar');
});
Route::get('/reservation', function () {
    return view('reservation');
});
Route::post("user",[UserAuth::class,'userLogin']);
//Route::view("login",'login');
Route::view("profile",'profile');
//Route::get('/list','UserAuth@list');


Route::get('/login', function () {
    if(session()->has('user'))
    {
        return redirect('profile');
    }
    return view('login');

});

Route::get('/logout', function () {
    if(session()->has('user'))
    {
        session()->pull('user');
    }
    return redirect('login');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
