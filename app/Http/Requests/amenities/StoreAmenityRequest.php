<?php

namespace App\Http\Requests\amenities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreAmenityRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',

        ];
    }
    
    public function authorize()
    {
        return true;
    }
    
}