<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Fname',
        'Lname',
        'email',
        'phone',
        'address',
        'role_id',
        'password',
        'gender',
        'student_id_card',
        'national_id_card',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'agent_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'student_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'student_id');
    }

    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function deleteProfilePhoto()
    {
        // Set 'profile_photo' column to null
        $this->profile_photo = null;
        $this->save();
    }

    public function isAdmin()
    {
        return $this->role_id === 1; // Adjust 'role' column as per your database structure
    }

    // Define isAgent method to check if user has agent role
    public function isAgent()
    {
        return $this->role_id === 3; // Adjust 'role' column as per your database structure
    }
}
