<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Property;
use App\Models\User;

class BookingCancelAgent extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;
    public $property;
    public $booking;

    public function __construct(User $agent, Property $property, Booking $booking)
    {
        $this->agent = $agent;
        $this->property = $property;
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->view('emails.booking_cancel_agent')
                    ->subject('Cancellation Notification')
                    ->with([
                        'agent' => $this->agent,
                        'property' => $this->property,
                        'booking' => $this->booking,
                    ]);
    }
}
