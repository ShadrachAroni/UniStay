<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the role ID of the authenticated user
            $role = Auth::user()->role_id;

            // Redirect the user based on their role
            switch ($role) {
                case 1:
                    return view('admin.dashboard'); // Redirect to admin dashboard
                    break;
                case 3:
                    return view('agent.dashboard'); // Redirect to agent dashboard
                    break;
                default:
                    return view('dashboard'); // Redirect to default dashboard
                    break;
            }
        } else {
            // User is not authenticated, redirect to login page
            return redirect()->route('login');
        }
    }
}
