<?php

namespace App\Http\Requests\properties;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StorePropertyRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'policies' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            'county' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'beds_start' => 'nullable|int|max:255',
            'beds_end' => 'nullable|int|max:255',
            'baths' => 'nullable|int|max:255',
            'street' => 'nullable|string|max:255',
            'area_name' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'property_type_id' => 'required|exists:property_types,id',
            'availability_status' => 'required|in:available,booked,unavailable',
            'payment' => 'required|in:monthly,yearly,bimonthly,quartely',
            'video' => 'nullable|mimes:mp4,avi,mov,mkv|max:20480', // 20MB max size
            'photos.*' => 'required|file|mimes:jpg,jpeg,png|max:5000',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'categories' => 'array|exists:property_categories,id',
            'features' => 'array|exists:property_features,id',
            'amenities' => 'array|exists:property_amenities,id',
            'surroundings' => 'array|exists:surrounding_areas,id',
            'posted_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'video.required' => 'One video is required.',
            'video.mimes' => 'The video must be a file of type: mp4, avi, mov.',
            'video.max' => 'The video may not be greater than 20MB.',
        ];
    }
    
    public function authorize()
    {
        return true;
    }
    
}