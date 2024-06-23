<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'title',
        'description',
        'address',
        'city',
        'state',
        'zipcode',
        'price',
        'category_id',
        'property_type_id',
        'availability_status',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'id');
    }

   /* public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }



    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'property_feature_mappings', 'property_id', 'feature_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(PropertyAmenity::class, 'property_amenity_mappings', 'property_id', 'amenity_id');
    }

    public function surroundingAreas()
    {
        return $this->belongsToMany(SurroundingArea::class, 'property_surrounding_area_mappings', 'property_id', 'surrounding_area_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'property_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'property_id');
    } */
}
