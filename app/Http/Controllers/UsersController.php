<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserRejectedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
       
        $roles = Role::all();// Fetch all roles to use in the index view
        $users = User::with('role')->get();

        return view('users.index', compact('users', 'roles'));
    }

    public function create()
    {

        $roles = Role::all();

        return view('users.create', compact('roles'));
    }
    public function store(StoreUserRequest $request)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Create a new user with validated data, ensuring the password is hashed
            $user = User::create([
                'Fname' => $validatedData['Fname'],
                'Lname' => $validatedData['Lname'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'email_verified_at' => now(),
                'password' => bcrypt($validatedData['password']), // Hash the password
                'role_id' => $validatedData['role_id'],
            ]);
    
            // Redirect to users index with a success message
            return redirect()->route('users.index')->with('success', 'User created successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the user.'])->withInput();
        }
    }
    

    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        
        return view('users.edit', compact('user', 'roles'));
    }
    
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Update user with validated data
            $user->update([
                'Fname' => $validatedData['Fname'],
                'Lname' => $validatedData['Lname'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'role_id' => $validatedData['role_id'],
            ]);
    
            // Only update the password if it's provided
            if (!empty($validatedData['password'])) {
                $user->update([
                    'password' => bcrypt($validatedData['password']),
                ]);
            }
    
            // Redirect to users index with a success message
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the user.'])->withInput();
        }
    }
    

    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('users.index');
    }

    public function verification()
    {
       
        $roles = Role::all();// Fetch all roles to use in the index view
        $users = User::with('role')->get();

        return view('users.verification', compact('users', 'roles'));
    }

    public function approve(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the status and verified fields
        $user->status = 'verified'; // Assuming 'status' is the field to update
        $user->verified = true; // Assuming 'verified' is the boolean field

        // Save the changes
        $user->save();

        // Redirect back or to any other route
        return response()->json(['message' => 'User approved successfully'], 200)
        ->header('Content-Type', 'application/json')
        ->withHeaders([
            'Location' => route('users.verification') // Set the location header for redirection
        ]);
    }

    public function reject(User $user)
    {
        $user->delete();

        // Send rejection email notification
        Notification::send($user, new UserRejectedNotification());

        return redirect()->route('users.verification');
    }
}
