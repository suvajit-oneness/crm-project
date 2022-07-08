<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('dashboard', function () {
    return view('hr_intern.dashboard.index');
})->name('hr_intern.dashboard');