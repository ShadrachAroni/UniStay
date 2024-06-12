<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role_id;

        switch ($role) {
            case '1':
                return view('admin.dashboard');
                break;
            case '3':
                return view('agent.dashboard');
                break;
            default:
                return view('dashboard');
                break;
        }
    }
}
