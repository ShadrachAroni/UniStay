<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function data()
    {
       
        $roles = Role::all();// Fetch all roles to use in the index view
        $users = User::with('role')->get();

        return view('users.Admins', compact('users', 'roles'));
    }

    public function MyListings(){
        
        $properties = Property::all();

        return view('admin.MyListings', compact('properties'));
    }

}
