<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'agent_id', 'title', 'description','policies', 'country', 'county', 'city', 'street', 'area_name', 'latitude','longitude', 'price', 'property_type_id', 'availability_status','posted_at'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function categories()
    {
        return $this->belongsToMany(PropertyCategory::class, 'property_category_mappings');
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
