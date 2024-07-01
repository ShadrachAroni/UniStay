<?php

namespace App\Http\Controllers;

use App\Http\Requests\properties\StorePropertyRequest;



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
    public function str(Request $request)
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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
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


    public function store(StorePropertyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $filename = date('YmdHi') . $photo->getClientOriginalName();
                $photo->move(public_path('upload/images'), $filename);
                $photos[] = $filename;
            }
            $data['photos'] = json_encode($photos);
        }

        if ($request->hasFile('videos')) {
            $videos = [];
            foreach ($request->file('videos') as $video) {
                $filename = date('YmdHi') . $video->getClientOriginalName();
                $video->move(public_path('upload/video'), $filename);
                $videos[] = $filename;
            }
            $data['videos'] = json_encode($videos);
        }

        $property = Property::create($data);

        $property->features()->sync($request->input('features', []));
        $property->amenities()->sync($request->input('amenities', []));
        $property->surroundings()->sync($request->input('surroundings', []));
        $property->categories()->sync($request->input('categories', []));

        return redirect()->route('properties.index')->with('success', 'Property added successfully.');
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

        if (Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 3)) {
            $categories = PropertyCategory::all();
            $propertyTypes = PropertyType::all();
            $features = PropertyFeature::all();
            $amenities = PropertyAmenity::all();
            $surroundings = SurroundingArea::all();
            return view('pages.add', compact('categories', 'propertyTypes', 'features', 'amenities', 'surroundings'));
        } else {
            return redirect()->route('home')->with([
                'showLogin' => true,
            ]);
        }
    }

    public function user(){

        $users = User::all(); // Fetch all users from the database

        return view('home', compact('users'));
    }

    public function view(){

        return view('pages.listings');
    }

}
