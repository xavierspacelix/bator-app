<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser);
            session()->regenerate();
        } else {
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->save();

            $socialAccount = new SocialAccount([
                'user_id' => $newUser->id,
                'provider_name' => $provider,
                'provider_id' => $user->id,
            ]);

            $newUser->socialAccounts()->save($socialAccount);

            auth()->login($newUser);
            flash()->addSuccess('Selamat Datang, ' . $newUser->name);
            session()->regenerate();
            return redirect()->intended(RouteServiceProvider::Public);
        }
    }
}
