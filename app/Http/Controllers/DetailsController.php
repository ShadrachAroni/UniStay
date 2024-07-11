<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DetailsController extends Controller
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
    public function update(Request $request)
    {
        try {
    
            $id = Auth::user()->id;
            $data = User::find($id);

            $data->Fname = $request ->Fname;
            $data->Lname = $request ->Lname;
            $data->email = $request ->email;
            $data->phone = $request ->phone;
            $data->address = $request ->address;
            $data->gender = $request ->gender;
            $data->updated_at = now();


            if ($request->file('profile_photo')){
                $file = $request->file('profile_photo');
                @unlink(public_path('upload/img/'.$data->profile_photo));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/img'),$filename);
                $data['profile_photo'] = $filename;
            }
            
            
            $data->save();


            // Redirect to users index with a success message
             return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while Updating your profile ' . $e->getMessage()]);
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
