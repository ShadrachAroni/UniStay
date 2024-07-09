<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Property;
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

        $user = auth()->user();
        
        $properties = Property::where('agent_id', $user->id)->get();

        return view('agent.MyListings', compact('properties'));

    }
}
