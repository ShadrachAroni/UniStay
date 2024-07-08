<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                return view('user.dashboard');
                break;
        }
    }
    
    public function about(){
        return view('pages.aboutUs');
    }

    public function contact(){
        return view('pages.contactUs');
    }

    public function showTerms(){
        // Path to the markdown.terms file
    $filePath = resource_path('markdown/terms.md');

    // Read the contents of the file
    $terms = file_get_contents($filePath);

    // Pass the contents to the view
    return view('terms', ['terms' => $terms]);
    }

    public function showPolicy(){
    $filePath = resource_path('markdown/policy.md');

    // Read the contents of the file
    $policy = file_get_contents($filePath);

    // Pass the contents to the view
    return view('policy', ['policy' => $policy]);
    }

    public function AgentRegister() {

        $id = Auth::user()->id;
        $user = User::findOrFail($id); // Ensure that you get a single user instance

        return view('auth.agent', ['user' => $user]);
    }
}
