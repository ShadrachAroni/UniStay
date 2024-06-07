<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;

class CustomLoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = $request->user();
        $role = $user->role; // Assuming your User model has a 'role' attribute

        switch ($role) {
            case 'admin':
                $redirectUrl = route('admin.dashboard');
                break;
            case 'agent':
                $redirectUrl = route('agent.dashboard');
                break;
            default:
                $redirectUrl = route('dashboard');
                break;
        }

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended($redirectUrl);
    }
}
