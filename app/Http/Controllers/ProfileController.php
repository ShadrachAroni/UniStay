<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Prepare data for update
            $updateData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
            ];
    
            // Only update role_id if it's provided in the request
            if (isset($validatedData['role_id'])) {
                $updateData['role_id'] = $validatedData['role_id'];
            }
    
            // Update user with validated data
            $user->update($updateData);
    
            // Update password if provided
            if (!empty($validatedData['password'])) {
                $user->password = bcrypt($validatedData['password']);
                $user->save();
            }
    
            // Redirect to users index with a success message
            return redirect()->route('agent.profile')->with('success', 'User updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the user.'])->withInput();
        }
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
