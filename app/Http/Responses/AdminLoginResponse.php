<?php
 
namespace App\Http\Responses;

use laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use laravel\Fortify\Fortify;

class AdminLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended('admin/dashboard');
    }
}
