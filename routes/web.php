<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/account', function () {
    return view('account');
})->name('account');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::post('/checkout', function () {
    return view('checkout');
})->name('checkout.process');