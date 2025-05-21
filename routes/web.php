<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::post('/checkout', function () {
    return view('checkout');
})->name('checkout.process');


Route::get('/login', function () {
    return view('auth.login-register');
})->name('login');

Route::get('/register', function () {
    return view('auth.login-register');
})->name('register');