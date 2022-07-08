<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('dashboard', function () {
    return view('sales_intern.dashboard.index');
})->name('sales_intern.dashboard');