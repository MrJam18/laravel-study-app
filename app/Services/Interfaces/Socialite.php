<?php
declare(strict_types=1);

namespace App\Services\Interfaces;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Contracts\User as SocialiteUser;

interface Socialite
{
   function handle(SocialiteUser $user): RedirectResponse;
}
