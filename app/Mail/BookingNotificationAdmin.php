<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Property;
use App\Models\User;

class BookingNotificationAdmin extends Mailable
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
        return $this->view('emails.booking_notification_admin')
                    ->subject('Booking Notification')
                    ->with([
                        'agent' => $this->agent,
                        'property' => $this->property,
                    ]);
    }
}
