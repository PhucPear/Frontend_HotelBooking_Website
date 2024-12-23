<?php

use Illuminate\Support\Facades\Route;
//USER
Route::get('/index', function () {
    return view('User.index');
});
Route::get('/login', function () {
    return view('User.login');
});
Route::get('/register', function () {
    return view('User.register');
});
Route::get('/booking', function () {
    return view('User.booking');
});
Route::get('/booking-history', function () {
    return view('User.booking-history');
});
Route::get('/payment-confirmation', function () {
    return view('User.payment-confirmation');
});
//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('Admin.pages.login');
    });
    Route::get('/index', function () {
        return view('Admin.pages.index');
    });
    Route::get('/auths', function () {
        return view('Admin.pages.auth');
    });
    Route::get('/employees', function () {
        return view('Admin.pages.employee');
    });
    Route::get('/rooms', function () {
        return view('Admin.pages.room');
    });
    Route::get('/room-types', function () {
        return view('Admin.pages.room-type');
    });
    Route::get('/customers', function () {
        return view('Admin.pages.customer');
    });
    Route::get('/bills', function () {
        return view('Admin.pages.bill');
    });
});