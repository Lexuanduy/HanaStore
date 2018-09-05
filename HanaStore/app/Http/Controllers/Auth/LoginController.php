<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/user/home';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
