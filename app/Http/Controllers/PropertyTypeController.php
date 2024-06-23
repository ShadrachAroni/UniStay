<?php

namespace App\Http\Controllers;

use App\Http\Requests\Types\StoreTypeRequest;
use App\Http\Requests\Types\UpdateTypeRequest;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function types()
    {
        $types = PropertyType::all();

        return view('listings.types', compact('types'));
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
    public function store(StoreTypeRequest $request)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Create a new type with validated data, ensuring the password is hashed
            $type = PropertyType::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
    
            // Redirect to types index with a success message
            return redirect()->route('listings.types')->with('success', 'type created successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the type.'])->withInput();
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
    public function update(UpdateTypeRequest $request, PropertyType $type)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Update user with validated data
            $type->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);

            // Redirect to users index with a success message
            return redirect()->route('listings.types')->with('success', 'Type updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the user.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyType $type)
    {
        $type->delete();

        return redirect()->route('listings.types');
    }
}
