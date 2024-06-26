<?php

namespace App\Http\Controllers;

use App\Http\Requests\amenities\StoreAmenityRequest;
use App\Http\Requests\amenities\UpdateAmenityRequest;
use App\Models\PropertyAmenity;
use Illuminate\Http\Request;

class PropertyAmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function amenities()
    {
        $amenities = PropertyAmenity::all();

        return view('listings.amenities', compact('amenities'));
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
    public function store(StoreAmenityRequest $request)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Create a new Amenity with validated data, ensuring the password is hashed
            $Amenity = PropertyAmenity::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
    
            // Redirect to amenities index with a success message
            return redirect()->route('listings.amenities')->with('success', 'Amenity created successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the Amenity.'])->withInput();
        }
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
    public function update(UpdateAmenityRequest $request, PropertyAmenity $amenity)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Update user with validated data
            $amenity->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);

            // Redirect to users index with a success message
            return redirect()->route('listings.amenities')->with('success', 'Amenity updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the user.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyAmenity $amenity)
    {
        $amenity->delete();

        return redirect()->route('listings.amenities');
    }
}
