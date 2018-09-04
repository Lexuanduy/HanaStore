<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user);

        // Chỗ này để check xem nó có chạy hay không
        // dd($user);

        Auth::login($authUser, true);

        return redirect()->route('homeClient');
    }

    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('provider_id', $facebookUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        return User::create(
            [
                'name' => $facebookUser->name,
                'password' => $facebookUser->token,
                'email' => $facebookUser->email,
                'provider_id' => $facebookUser->id,
                'provider' => $facebookUser->id,
                'avatar' => $facebookUser->avatar
            ]
        );
    }
}
