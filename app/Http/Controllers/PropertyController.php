<?php

namespace App\Http\Controllers;

use App\Http\Requests\properties\StorePropertyRequest;
use App\Models\Photo;
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

     public function store(StorePropertyRequest $request)
     {
         try {
             // Validate and prepare data
             $data = $request->validated();
             $data['agent_id'] = Auth::id();
     
             // Create the property
             $property = Property::create($data);
     
             // Sync features, amenities, surroundings, and categories
             $property->features()->sync($request->input('features', []));
             $property->amenities()->sync($request->input('amenities', []));
             $property->surroundings()->sync($request->input('surroundings', []));
             $property->categories()->sync($request->input('categories', []));
     
             // Handle photo uploads
             if ($request->hasFile('photos')) {
                 $photos = $request->file('photos');
                 $uploadedPhotos = [];
     
                 foreach ($photos as $photo) {
                     // Generate a unique filename
                     $filename = date('YmdHi') . $photo->getClientOriginalName();
                     // Move the file to the public/upload/img directory
                     $photo->move(public_path('upload/photos'), $filename);
                     // Store the filename in the array
                     $uploadedPhotos[] = $filename;
     
                     // Save photo to the database
                     Photo::create([
                         'property_id' => $property->id,
                         'filename' => $filename,
                     ]);
                 }
             }
     
             return redirect()->route('pages.add')->with('success', 'Property added successfully.');
         } catch (\Exception $e) {
             return redirect()->back()->withErrors(['error' => 'An error occurred while creating the Listing: ' . $e->getMessage()])->withInput();
         }
     }

    /**
     * Display the specified resource.
     */
    public function show(/*string $id*/)
    {

        return view('pages.show');
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
    public function destroy(Property $property)
    {
        try {
            $property = Property::findOrFail($property);
            $property->delete();
    
            $role = Auth::user()->role_id;
            switch ($role) {
                case '1':
                    return view('admin.MyListings');
                    break;
                case '3':
                    return view('agent.MyListings');
                    break;
                default:
                    return view('home');
                    break;
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the property: ' . $e->getMessage()]);
        }
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
            return redirect()->to('/')->with('showLogin', true);
        }
    }

    public function view(){

        return view('pages.listings');
    }

}
