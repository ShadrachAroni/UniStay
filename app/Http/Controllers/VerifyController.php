<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserVerifyRequest;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserRejectedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class VerifyController extends Controller
{
   
    public function update(UpdateUserVerifyRequest $request, User $user)
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
                'gender'=> $validatedData['gender'],
            ]);
    
            // Only update the password if it's provided
            if (!empty($validatedData['password'])) {
                $user->update([
                    'password' => bcrypt($validatedData['password']),
                ]);
            }
    
          
            return back()->with('success', 'User updated successfully.'); 

        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating your profile: ' . $e->getMessage()]);
        }
    }
    
}
