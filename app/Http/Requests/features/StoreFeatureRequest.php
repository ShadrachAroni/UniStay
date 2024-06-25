<?php

namespace App\Http\Requests\features;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreFeatureRequest extends FormRequest
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