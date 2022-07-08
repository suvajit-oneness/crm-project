<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('dashboard', function () {
    return view('hr.dashboard.index');
})->name('hr.dashboard');