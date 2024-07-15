<?php

namespace App\Http\Controllers;

use App\Mail\BookingCancelAgent;
use App\Mail\BookingCancelStudent;
use App\Mail\BookingConfirmationEmail;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
{
    try {
        $user = auth()->user()->id;

        // Check if the logged-in user is either the student or the agent associated with the property
        if ($booking->student_id == $user || $booking->property->agent_id == $user) {
            // Delete the booking
            $booking->delete();

            return redirect()->back()->with('success', 'Request deleted successfully.');
        } else {
            // Unauthorized deletion attempt
            return redirect()->back()->withErrors(['error' => 'You are not authorized to delete this booking.']);
        }
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the booking: ' . $e->getMessage()]);
    }
}
    public function cancel($id)
    {
        $user = Auth::user();
        $property = Property::find($id);

        try {
            // Update bookings where student_id matches the logged-in user's ID
            Booking::where(function ($query) use ($user) {
                $query->where('student_id', $user->id)
                    ->where('status', 'pending');
            })
            ->orWhereHas('property', function ($query) use ($user) {
                $query->where('agent_id', $user->id);
            })
            ->update(['status' => 'canceled']);

            if(Auth::check()){
            // Send email to the student
                Mail::to(auth()->user()->email)->send(new BookingCancelStudent(auth()->user(), $property));

                // Send email to the agent
                Mail::to($property->agent->email)->send(new BookingCancelAgent($property->agent, $property));
            }else{
                    // Send email to the student
                Mail::to(auth()->user()->email)->send(new BookingCancelAgent(auth()->user(), $property));

                // Send email to the agent
                Mail::to($property->agent->email)->send(new BookingCancelStudent($property->agent, $property));
            }

            return redirect()->back()->with('success', 'Bookings cancelled successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while cancelling bookings: ' . $e->getMessage()]);
        }
    }

    public function confirm(Request $request)
    {
        try {
            // Retrieve the property ID and student ID from the request
            $propertyId = $request->input('property_id');
            $selectedStudentId = $request->input('student_id');
            $studentEmail = $request->input('student_email');
    
            // Retrieve all bookings for the specified property
            $bookings = Booking::where('property_id', $propertyId)->get();
    
            // Start a transaction to ensure atomic updates
            DB::beginTransaction();
    
            foreach ($bookings as $booking) {
                // Change status to canceled for bookings linked to the property
                if ($booking->property_id == $propertyId) {
                    // Skip changing status for the selected student's booking
                    if ($booking->student_id != $selectedStudentId) {
                        $booking->status = 'canceled';
                        $booking->save();
                    }
                }
            }
            
            // Now, change status to confirmed for the selected student's booking
            $selectedBooking = Booking::where('property_id', $propertyId)
                                      ->where('student_id', $selectedStudentId)
                                      ->first();
            if ($selectedBooking) {
                $selectedBooking->status = 'confirmed';
                $selectedBooking->save();
            }
    
            // Change property availability status to booked
            $property = Property::find($propertyId);
            $property->updateAvailability('booked');
    
            // Commit the transaction
            DB::commit();
    
            // Send confirmation email to the selected student
            Mail::to($studentEmail)->send(new BookingConfirmationEmail($property));
    
            return redirect()->back()->with('success', 'Confirmation email has been sent.');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'An error occurred while confirming bookings: ' . $e->getMessage()]);
        }
    }
    

    public function status(Request $request)
{
    try {
        
        $propertyId = $request->input('property_id');
        $availabilityStatus = $request->input('availability_status');

        // Retrieve the property
        $property = Property::find($propertyId);
        if (!$property) {
            throw new \Exception("Property not found.");
        }

        // Check if the availability status is the same as the current status
        if ($property->availability_status == $availabilityStatus) {
            return redirect()->back()->with('info', 'No changes were made as the status remains the same.');
        }

        // Retrieve all bookings for the specified property
        $bookings = Booking::where('property_id', $propertyId)->get();

        // Start a transaction to ensure atomic updates
        DB::beginTransaction();

        foreach ($bookings as $booking) {
            if ($booking->property_id == $propertyId) {
                // Change status to pending for bookings linked to the specified property
                $booking->status = 'pending';
                $booking->save();
            }
        }

        // Change property availability status
        $property->availability_status = $availabilityStatus;
        $property->save();

        // Commit the transaction
        DB::commit();

        return redirect()->back()->with('success', 'Property status changed successfully.');
    } catch (\Exception $e) {
        // Rollback the transaction on error
        DB::rollback();
        return redirect()->back()->withErrors(['error' => 'An error occurred while changing status: ' . $e->getMessage()]);
    }
}
}
