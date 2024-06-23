<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['property_id', 'student_id', 'rating', 'comment'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
