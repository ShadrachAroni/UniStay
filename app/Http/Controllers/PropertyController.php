<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\PropertyFeature;
use App\Models\PropertyAmenity;
use App\Models\SurroundingArea;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function types()
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable',
            'policies' => 'nullable',
            'country' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'area_name' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'categories' => 'required|integer|exists:categories,id',
            'property_type_id' => 'required|integer|exists:property_types,id',
            'availability_status' => 'required|in:available,booked,unavailable',
            'features' => 'array',
            'amenities' => 'array',
            'photos' => 'array',
            'photos.*' => 'file|mimes:jpg,jpeg,png',
            'videos' => 'array',
            'videos.*' => 'file|mimes:mp4,mov,avi,mkv',
        ]);
    
        $property = Property::create($validatedData);
        
        // Handle file uploads
        $propertyFolder = 'properties/' . $property->id;
        $imageFolder = $propertyFolder . '/images';
        $videoFolder = $propertyFolder . '/videos';
    
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $photo) {
                $photo->storeAs($imageFolder, 'image_' . ($index + 1) . '.' . $photo->getClientOriginalExtension());
            }
        }
    
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $index => $video) {
                $video->storeAs($videoFolder, 'video_' . ($index + 1) . '.' . $video->getClientOriginalExtension());
            }
        }
    
        // Sync relationships
        $property->categories()->sync($request->categories);
        $property->features()->sync($request->features);
        $property->amenities()->sync($request->amenities);
        $property->surroundings()->sync($request->surroundings);
    
        return redirect()->route('pages.addListings')->with('success', 'Listing added successfully!');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add() {

        if (Auth::check() && Auth::user()->role_id === 1 && Auth::user()->role_id === 3) {
            $categories = PropertyCategory::all();
            $propertyTypes = PropertyType::all();
            $features = PropertyFeature::all();
            $amenities = PropertyAmenity::all();
            $surroundings = SurroundingArea::all();
            return view('pages.add', compact('categories', 'propertyTypes', 'features', 'amenities', 'surroundings'));
        } elseif(Auth::check() && Auth::user()->role_id === 2){
            return redirect()->route('home')->with('showRegister', true);
        }else {
            // User is not authorized or not logged in, show the login modal or handle as needed
            return redirect()->route('home')->with('showModal', true);
        }
    }

}
