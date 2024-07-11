<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Booking;
use App\Models\Property;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
      return view('user.dashboard');
    }

    public function data()
    {
       
        $roles = Role::all();// Fetch all roles to use in the index view
        $users = User::with('role')->get();

        return view('users.Students', compact('users', 'roles'));
    }

    public function booked()
    {
        try {
            // Get the logged-in user's ID
            $userId = Auth::id();
    
            // Retrieve bookings where the logged-in user is the student
            $bookings = Booking::where('student_id', $userId)->with('property')->get();
    
            // Get the properties from the bookings
            $properties = $bookings->map(function ($booking) {
                return $booking->property;
            });
    
            // Return the view with the properties
            return view('user.Booked', compact('properties'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while retrieving booked properties: ' . $e->getMessage()]);
        }
    }
}
