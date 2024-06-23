<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurroundingArea extends Model
{
    protected $fillable = ['name', 'description'];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_surrounding_area_mappings');
    }
}
