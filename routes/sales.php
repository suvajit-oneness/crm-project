<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



    
    Route::get('dashboard',function(){
        return view('sales.dashboard.index');
    })->name('sales.dashboard');
    

    Route::get('/intern', [App\Http\Controllers\Sales\SalesController::class, 'index'])->name('intern.index');