<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'agent_id', 'title', 'description','policies', 'country', 'county', 'city', 'street', 'area_name', 'price', 'property_type_id', 'availability_status'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function category()
    {
        return $this->belongsToMany(PropertyCategory::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'property_feature_mappings');
    }

    public function amenities()
    {
        return $this->belongsToMany(PropertyAmenity::class, 'property_amenity_mappings');
    }

    public function surroundingAreas()
    {
        return $this->belongsToMany(SurroundingArea::class, 'property_surrounding_area_mappings');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
