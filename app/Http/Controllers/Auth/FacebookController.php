<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('email', $user->email)->first();

            if ($isUser) {
                $isUser->update([
                    'facebook_id' => $user->id,
                ]);
                Auth::login($isUser);
                return redirect('home');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'email_verified_at' => now(),
                    'password' => encrypt('facebook123')
                ]);

                Auth::login($createUser);
                return redirect('home');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
