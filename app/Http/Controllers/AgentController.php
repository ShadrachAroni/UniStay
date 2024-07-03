<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agent.dashboard');
    }

    public function data()
    {
       
        $roles = Role::all();// Fetch all roles to use in the index view
        $users = User::with('role')->get();

        return view('users.Agents', compact('users', 'roles'));
    }

    public function MyListings(){
        return view('agent.MyListings');
    }
}
