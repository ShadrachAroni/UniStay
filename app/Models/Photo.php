<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['property_id', 'filename'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}