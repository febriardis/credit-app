<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
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

    protected function guard()
    {
    	return Auth::guard('admin');
    }

    public function login(Request $req) {
        if (Auth::guard('admin')->attempt([
            'username' => $req->username,
            'password' => $req->password
        ])) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->withInput()
            ->with('pesan','Username atau password salah');
        }
    }

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('admin.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function authenticated(){
        return redirect()->route('dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
