<?php
declare(strict_types=1);

namespace App\Services\Socialite;

use App\Models\User;
use App\Services\Interfaces\Socialite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class StandardSocialiteLoginService implements Socialite
{

    function handle(SocialiteUser $user): RedirectResponse
    {
        /**
         * @var User|null $dbUser
         */
        $dbUser = User::query()->where('email', '=', $user->getEmail())->first();
        if(!$dbUser) {
            $dbUser = new User();
            $dbUser->name = $user->getName();
            $dbUser->email = $user->getEmail();
            $dbUser->password = \randomPassword();
            $dbUser->avatar_url = $user->getAvatar();
            $dbUser->save();
        }
        Auth::login($dbUser);
        return \redirect(\route('main'));
    }
}
