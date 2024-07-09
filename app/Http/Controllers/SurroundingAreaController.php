<?php

namespace App\Http\Controllers;

use App\Http\Requests\surroundings\StoreSurroundingRequest;
use App\Http\Requests\surroundings\UpdateSurroundingRequest;
use App\Models\SurroundingArea;
use Illuminate\Http\Request;

class SurroundingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function surroundings()
    {
        $surroundings = SurroundingArea::all();

        return view('listings.surroundings', compact('surroundings'));
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
    public function store(StoreSurroundingRequest $request)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Create a new Surrounding with validated data, ensuring the password is hashed
            $Surrounding = SurroundingArea::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
    
            // Redirect to surroundings index with a success message
            return redirect()->route('listings.surroundings')->with('success', 'Surrounding area created successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the Surrounding area.'])->withInput();
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
    public function update(UpdateSurroundingRequest $request, SurroundingArea $surrounding)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validated();
    
            // Update user with validated data
            $surrounding->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);

            // Redirect to users index with a success message
            return redirect()->route('listings.surroundings')->with('success', 'Surrounding updated successfully.');
    
        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the user.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurroundingArea $surrounding)
    {
        $surrounding->delete();

        return redirect()->back();
    }
}
