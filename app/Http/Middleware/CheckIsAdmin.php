<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{

    public function handle(Request $request, Closure $next): mixed
    {
        $user = Auth::user();
        if($user && $user->is_admin) return $next($request);
        else return \redirect(\route('main'))->with('alertMessage', 'Доступ в панель администратора запрещен для данного пользователя')->with('alertType', 'danger');
    }
}
