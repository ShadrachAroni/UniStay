<?php
 
namespace App\Http\Responses;

use laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use laravel\Fortify\Fortify;

class AgentLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended('agent/dashboard');
    }
}
