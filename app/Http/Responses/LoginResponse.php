<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($request->wantsJson()) {
            return new JsonResponse(['two_factor' => false]);
        }

        switch ($user->role) {
            case 1:
                return redirect()->intended('/admin');
            case 2:
                return redirect()->intended('/agent');
            default:
                return redirect()->intended('/dashboard');
        }
    }
}