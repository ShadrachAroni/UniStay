<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Property;
use App\Models\User;

class BookingNotificationAgent extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;
    public $property;

    public function __construct(User $agent, Property $property)
    {
        $this->agent = $agent;
        $this->property = $property;
    }

    public function build()
    {
        return $this->view('emails.booking_notification_agent')
                    ->subject('New Booking Notification')
                    ->with([
                        'agent' => $this->agent,
                        'property' => $this->property,
                    ]);
    }
}
