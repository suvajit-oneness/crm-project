<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('command', function () {
    /* php artisan migrate */
    \Artisan::call('migrate:fresh --seed');
    dd("Migration Done");
});
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
// Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
Route::post('/login/post', [App\Http\Controllers\Auth\LoginController::class, 'userLogin'])->name('login.post');

Route::prefix('user')->name('user.')->group(function () {
    // Route::middleware(['auth:user'])->group(function () {
    Route::group(['middleware' => ['auth:user']], function () {
        Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
        // Route::get('/home/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        
        Route::group(['prefix' => 'sales'], function () {
            require 'sales.php';
        });


        Route::group(['prefix' => 'hr'], function () {
            require 'hr.php';
        });

        Route::group(['prefix' => 'salesIntern'], function () {
            require 'sales_intern.php';
        });

        Route::group(['prefix' => 'hrIntern'], function () {
            require 'hr_intern.php';
        });
    });
});


require 'admin.php';
require 'api.php';
// Route::group(['prefix'=>'sales','middleware'=>'sales'],function(){
//     // require 'sales.php';
    
//     Route::get('dashboard',function(){
//         return view('sales.dashboard.index');
//     })->name('sales.dashboard');

// });