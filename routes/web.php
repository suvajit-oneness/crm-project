<?php
use Illuminate\Http\Request;

// Auth::routes();

Route::get('command', function () {
	/* php artisan migrate */
    \Artisan::call('migrate:fresh --seed');
    dd("Migration Done");
});

require 'admin.php';
require 'api.php';