<?php

namespace App\Http\Controllers;

use App\Http\Requests\features\StoreFeatureRequest;
use App\Http\Requests\features\UpdateFeatureRequest;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;

class PropertyFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function features()
    {
        $features = PropertyFeature::all();

        return view('listings.features', compact('features'));
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
    public function store(StoreFeatureRequest $request)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Create a new feature with validated data, ensuring the password is hashed
            $feature = PropertyFeature::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
    
            // Redirect to features index with a success message
            return redirect()->route('listings.features')->with('success', 'feature created successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the feature.'])->withInput();
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
    public function update(UpdateFeatureRequest $request, PropertyFeature $feature)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Update user with validated data
            $feature->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);

            // Redirect to users index with a success message
            return redirect()->route('listings.features')->with('success', 'feature updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the user.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propertyfeature $feature)
    {
        $feature->delete();

        return redirect()->back();
    }
}
