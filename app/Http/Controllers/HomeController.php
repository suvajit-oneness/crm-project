<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->user_type) {
            case 1:
                // echo "hello";exit;
                return "here";
                return redirect('sales/dashboard.index');
                break;
            case 2:
                return redirect('sales/dashboard');
                break;
            case 3:
                return redirect('service/dashboard');
                break;
        }
        return view('home');
    }
}