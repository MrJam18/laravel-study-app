<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\Controller;
use App\Services\Socialite\StandardSocialiteLoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{
    function redirect(string $driver): \Symfony\Component\HttpFoundation\RedirectResponse | RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }
    function response(string $driver): RedirectResponse | View
    {
        try {
            switch ($driver) {
                case 'vkontakte':
                case 'google':
                    $service = new StandardSocialiteLoginService();
                    break;
                default:
                    throw new PageNotFoundException();
            }
        } catch (PageNotFoundException) {
            return \view('404');
        }
        $user = Socialite::driver($driver)->user();
        return $service->handle($user);
    }

}
