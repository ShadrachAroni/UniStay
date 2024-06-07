<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirectTo()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 1:
                return redirect('/admin');
            case 2:
                return redirect('/agent');
            default:
                return redirect('/dashboard');
        }
    }
}
