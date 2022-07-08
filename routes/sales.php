<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



    
    Route::get('dashboard',function(){
        return view('sales.dashboard.index');
    })->name('sales.dashboard');