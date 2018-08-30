<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\User;


class LoginController extends Controller
{
    use AuthenticatesUsers;

//    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->user();
        $findFisrt = User::where('email', $user->email)->where('status',1)->first();
        if ($findFisrt){
            Auth::login($findFisrt);
        }
        $newUser = new User();
        $newUser->id = $user->id;
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = bcrypt(str_random(6));
        $newUser->avatar = $user->avatar;
        $newUser->save();
        Auth::login($newUser);
    }
}
