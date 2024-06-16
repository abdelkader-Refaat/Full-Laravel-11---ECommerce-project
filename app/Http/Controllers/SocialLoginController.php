<?php

namespace App\Http\Controllers;

use App\Models\SocialLogin;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback($driver)
    {
        $user = Socialite::driver($driver)->user();

        $user_account = SocialLogin::where('provider', $driver)->where('provider_id', $user->getId())->first();
        if ($user_account) {
            Auth::login($user_account->user);
            Session::regenerate();
            return redirect()->intended('/');
        } else {
            $db_user = User::where('email', $user->email)->first();
            if ($db_user) {
                SocialLogin::create([
                    'provider' => $driver,
                    'provider_id' => $user->getId(),
                    'user_id' => $db_user->id,
                ]);
            }else{
                $db_user = User::create([
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                    "password" =>  bcrypt(rand(1000,9999)),
                ]);
            }
            Auth::login($db_user);
            Session::regenerate();
            return redirect()->intended('/');
        }
    }
}
