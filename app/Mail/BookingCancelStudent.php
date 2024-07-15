<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Property;
use App\Models\User;

class BookingCancelStudent extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $property;

    public function __construct(User $student, Property $property)
    {
        $this->student = $student;
        $this->property = $property;
    }

    public function build()
    {
        return $this->view('emails.booking_cancel_student')
                    ->subject('Cancellation Notification')
                    ->with([
                        'student' => $this->student,
                        'property' => $this->property,
                    ]);
    }
}
