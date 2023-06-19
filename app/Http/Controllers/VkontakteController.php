<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class VkontakteController extends Controller
{
    public function redirectToVk()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function handleVkCallback()
    {
        $user = "";
        try {
            $user = Socialite::driver('vkontakte')->user();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return Redirect::to('/');
    }

    private function findOrCreateUser($vkUser)
    {
        if ($authUser = User::where('vk_id', $vkUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $vkUser->name,
            'email' => $vkUser->email,
            'vk_id' => $vkUser->id
        ]);
    }
}