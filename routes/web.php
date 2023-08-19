<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login.html', function () {
    return view('login');
});

Route::get('/index.html', function () {
    return view('welcome');
});

Route::get('/register.html', function () {
    return view('register');
});

Route::get('/404.html', function () {
    return view('404');
});

Route::get('/blank.html', function () {
    return view('blank');
});

Route::get('/forgot-password.html', function () {
    return view('forgot-password');
});

Route::get('/tables.html', function () {
    return view('tables');
});

Route::get('/charts.html', function () {
    return view('charts');
});
