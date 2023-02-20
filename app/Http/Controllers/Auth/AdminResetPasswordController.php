<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;



use Illuminate\Http\Request;

class AdminResetPasswordController
{
    function resetPassword(Request $request)
    {
       return ['email' => $request->input('email')];
    }
}
