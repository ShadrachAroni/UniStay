<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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

    public function profile()
    {
      $user = Auth::user();

      return view('agent.profile', compact('user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Update user with validated data
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
            ]);
    
            if (!empty($validatedData['password'])) {
                $user->password = bcrypt($validatedData['password']);
            }
    
            // Redirect to users index with a success message
            return redirect()->route('agent.profile')->with('success', 'User updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the user.'])->withInput();
        }
    }


}
