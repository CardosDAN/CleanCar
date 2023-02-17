<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class GitHubController extends Controller
{
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function gitCallback()
    {
        try {

            $user = Socialite::driver('github')->user();

            $searchUser = User::where('email', $user->email)->first();

            if($searchUser){
                $searchUser->update([
                    'github_id' => $user->id,
                ]);
                Auth::login($searchUser);

                return redirect('home');

            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'email_verified_at' => now(),
                    'password' => encrypt('github12345')
                ]);

                Auth::login($gitUser);

                return redirect('home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
