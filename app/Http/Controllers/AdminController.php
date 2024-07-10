<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function MyListings()
    {
        $user = auth()->user();
        $properties = Property::where('agent_id', $user->id)->get();
    
        foreach ($properties as $property) {
            $photos = json_decode($property->photos, true);
            $property->photos = is_array($photos) ? $photos : [];
        }
    
        return view('admin.MyListings', compact('properties'));
    }

    public function Analytics(){

    // Fetch the data from the database
    $users = DB::table('users')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->where('role_id', 2)
        ->groupBy('date')
        ->get();

    $agents = DB::table('users')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->where('role_id', 3)
        ->groupBy('date')
        ->get();

    $properties = Property::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->groupBy('date')
        ->get();

        return view('admin.analytics', compact('users', 'agents', 'properties'));

    }

    public function messages(){

        return view('admin.messages');

    }

}
