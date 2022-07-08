<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Util\Json;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
    }


    public function index()
    {
        // return redirect()->route('home');
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 200);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            $userType = Auth::guard('user')->user()->user_type;
            // dd($user);
            // $sales = Auth::guard('user')->user()->user_type = 1;
            // $hr = Auth::guard('user')->user()->user_type = 2;
            // $salesIntern = Auth::guard('user')->user()->user_type = 3;
            // $hrIntern = Auth::guard('user')->user()->user_type = 4;

            if ($userType == 1) {
                return Redirect::to('user/sales/dashboard');
            } else if ($userType == 2) {
                return Redirect::to('user/hr/dashboard');
            } else if ($userType == 3) {
                return Redirect::to('user/sales_intern/dashboard');
            } else if ($userType == 4) {
                return Redirect::to('user/hr_intern/dashboard');
            }
            else{
                return "Type miss match";
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Credentials do not match']);
        }
    }

    public function logout(Request $request)
    {
        $this->guard('user')->logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}