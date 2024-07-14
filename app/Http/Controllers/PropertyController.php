<?php

namespace App\Http\Controllers;

use App\Http\Requests\properties\StorePropertyRequest;
use App\Mail\BookingConfirmationStudent;
use App\Mail\BookingNotificationAdmin;
use App\Mail\BookingNotificationAgent;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\PropertyFeature;
use App\Models\PropertyAmenity;
use App\Models\SurroundingArea;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

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

            // Handle video upload
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $videoFilename = date('YmdHi') . $video->getClientOriginalName();
                $video->move(public_path('upload/videos'), $videoFilename);
                $data['video'] = $videoFilename;
            }
            
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
            
     
             return redirect()->route('pages.add')->with('success', 'Listing added successfully.');
         } catch (\Exception $e) {
             return redirect()->back()->withErrors(['error' => 'An error occurred while creating the Listing: ' . $e->getMessage()])->withInput();
         }
     }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the specific property by ID
        $property = Property::with('photos')->findOrFail($id);
        
        return view('pages.show', compact('property'));
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
        $properties = Property::with('photos')->get();
        $categories = PropertyCategory::all();
        $propertyTypes = PropertyType::all();
        $features = PropertyFeature::all();
        $amenities = PropertyAmenity::all();
        $surroundings = SurroundingArea::all();
        return view('pages.listings', compact('categories', 'propertyTypes', 'features', 'amenities', 'surroundings','properties'));
    }

    public function book($id)
    {
        try {
            $property = Property::find($id);

            if (!$property) {
                // Property not found, handle error
                return redirect()->back()->with('error', 'Listing not found.');
            }

            // Create a new booking record
            $booking = new Booking();
            $booking->property_id = $property->id;
            $booking->student_id = auth()->user()->id; // Assuming you are using Laravel's authentication
            $booking->booking_date = now(); // Set the booking date as current date/time
            $booking->status = 'pending'; // Initial status
            $booking->payment_status = 'pending'; // Initial payment status
            $booking->save();

            // Send email to the student
            Mail::to(auth()->user()->email)->send(new BookingConfirmationStudent(auth()->user(), $property));

            // Send email to the agent
            Mail::to($property->agent->email)->send(new BookingNotificationAgent($property->agent, $property));

             // Send email to admin
             Mail::to('Shadracking7@gmail.com')->send(new BookingNotificationAdmin($property->agent, $property));

            // Redirect back with SweetAlert success message
            return redirect()->back()->with('success', 'Listing successfully booked.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while booking the listing: ' . $e->getMessage()]);
        }
    }

    public function requests()
    {
        try {
            $role = Auth::user()->role_id;
            $user = Auth::user();

            switch ($role) {
                case '1':
                    // Fetch all properties and bookings for admin
                    $bookings = Booking::select('bookings.*')
                        ->join('properties', 'bookings.property_id', '=', 'properties.id')
                        ->where('properties.agent_id', $user->id)
                        ->where(function ($query) {
                            $query->where('bookings.status', 'pending')
                                ->orWhere('bookings.status', 'canceled');
                        })
                        ->get();
                    return view('admin.Requests', compact('bookings'));
                    break;

                case '3':
                    // Fetch all properties and bookings for agent
                    $bookings = Booking::select('bookings.*')
                        ->join('properties', 'bookings.property_id', '=', 'properties.id')
                        ->where('properties.agent_id', $user->id)
                        ->where(function ($query) {
                            $query->where('bookings.status', 'pending')
                                ->orWhere('bookings.status', 'canceled');
                        })
                        ->get();
                    return view('agent.Requests', compact('bookings'));
                    break;

                case '2':
                    // Fetch all properties and bookings for user
                    $bookings = Booking::select('bookings.*')
                        ->join('properties', 'bookings.property_id', '=', 'properties.id')
                        ->where('bookings.student_id', $user->id)
                        ->where(function ($query) {
                            $query->where('bookings.status', 'pending')
                                ->orWhere('bookings.status', 'canceled');
                        })
                        ->get();
                    return view('user.Requests', compact('bookings'));
                    break;

                default:
                    return view('home');
                    break;
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
    
        // Retrieve properties matching the keyword
        $properties = Property::with('photos')
            ->where('title', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->orWhere('payment', 'like', "%{$keyword}%")
            ->orWhere('city', 'like', "%{$keyword}%")
            ->orWhere('street', 'like', "%{$keyword}%")
            ->orWhere('area_name', 'like', "%{$keyword}%")
            ->orWhereHas('features', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->orWhereHas('amenities', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->orWhereHas('surroundings', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->orWhereHas('categories', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->get();
    
        // Retrieve all other related data
        $categories = PropertyCategory::all();
        $propertyTypes = PropertyType::all();
        $features = PropertyFeature::all();
        $amenities = PropertyAmenity::all();
        $surroundings = SurroundingArea::all();
    
        return view('pages.listings', compact('categories', 'propertyTypes', 'features', 'amenities', 'surroundings', 'properties'));
    }

    public function search2(Request $request)
    {
        $query = Property::with('photos');
    
        // Keyword search
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->orWhere('payment', 'like', "%{$keyword}%")
                    ->orWhere('city', 'like', "%{$keyword}%")
                    ->orWhere('street', 'like', "%{$keyword}%")
                    ->orWhere('area_name', 'like', "%{$keyword}%")
                    ->orWhereHas('features', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    })
                    ->orWhereHas('amenities', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    })
                    ->orWhereHas('surroundings', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    })
                    ->orWhereHas('categories', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    });
            });
        }
    
        // Filter by price range
        if ($request->filled('priceRange')) {
            $query->orWhere('price', '<=', $request->priceRange);
        }
    
        // Filter by property types
        if ($request->filled('propertyTypes') && $request->propertyTypes != 'none') {
            $query->orWhere('property_type_id', $request->propertyTypes);
        }
    
        // Filter by categories
        if ($request->filled('categories') && $request->categories != 'none') {
            $query->orWhere('category_id', $request->categories);
        }
    
        // Filter by features
        if ($request->filled('features') && $request->features != 'none') {
            $query->whereHas('features', function ($q) use ($request) {
                $q->orWhere('id', $request->features);
            });
        }
    
        // Filter by amenities
        if ($request->filled('amenities') && $request->amenities != 'none') {
            $query->whereHas('amenities', function ($q) use ($request) {
                $q->orWhere('id', $request->amenities);
            });
        }
    
        // Filter by surroundings
        if ($request->filled('surroundings') && $request->surroundings != 'none') {
            $query->whereHas('surroundings', function ($q) use ($request) {
                $q->orWhere('id', $request->surroundings);
            });
        }
    
        // Filter by country
        if ($request->filled('country')) {
            $query->orWhere('country', 'like', '%' . $request->country . '%');
        }
    
        // Filter by city
        if ($request->filled('city')) {
            $query->orWhere('city', 'like', '%' . $request->city . '%');
        }
    
        // Filter by area name
        if ($request->filled('area_name')) {
            $query->orWhere('area_name', 'like', '%' . $request->area_name . '%');
        }
    
        // Filter by street
        if ($request->filled('street')) {
            $query->orWhere('street', 'like', '%' . $request->street . '%');
        }
    
        // Get the results
        $properties = $query->get();
    
        // Retrieve all other related data
        $categories = PropertyCategory::all();
        $propertyTypes = PropertyType::all();
        $features = PropertyFeature::all();
        $amenities = PropertyAmenity::all();
        $surroundings = SurroundingArea::all();
    
        return view('pages.listings', compact('categories', 'propertyTypes', 'features', 'amenities', 'surroundings', 'properties'));
    }
    
    

    
    public function feature(Request $request, $id)
    {
        try {
            // Find the property by ID
            $property = Property::findOrFail($id);


            $property->featured = true; 

            // Save the changes
            $property->save();

            return redirect()->back()->with('success', 'Property added to Featured');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function Unfeature(Request $request, $id)
    {
        try {
            // Find the property by ID
            $property = Property::findOrFail($id);


            $property->featured = false; 

            // Save the changes
            $property->save();

            return redirect()->back()->with('success', 'Property removed from Featured');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
