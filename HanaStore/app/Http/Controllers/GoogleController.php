<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $authUser = $this->findOrCreateUser($user);

//        // Chỗ này để check xem nó có chạy hay không
//        // dd($user);
//
        Auth::login($authUser, true);

        return redirect()->route('giohang');
    }

    private function findOrCreateUser($googleUser)
    {
        $authUser = User::where('provider_id', $googleUser->id)->first();

        if ($authUser) {
            $authUser->name = $googleUser->name;
            $authUser->password = $googleUser->token;
            $authUser->email = $googleUser->email;
            $authUser->provider_id = $googleUser->id;
            $authUser->provider = $googleUser->id;
            $avatar = str_replace('?sz=50','',$googleUser->avatar);
            $authUser->avatar = $avatar;
            $authUser->save();
            return $authUser;
        }
        $avatar = str_replace('?sz=50', '', $googleUser->avatar);
        return User::create(
            [
                'name' => $googleUser->name,
                'password' => $googleUser->token,
                'email' => $googleUser->email,
                'provider_id' => $googleUser->id,
                'provider' => $googleUser->id,
                'avatar' => $avatar
            ]
        );
    }
}
