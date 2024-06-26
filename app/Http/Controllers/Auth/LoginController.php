<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function username(){
        return 'username';
    }
    
    protected function credentials(Request $request){
        return [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
    }
    
    protected function validateLogin(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }
}