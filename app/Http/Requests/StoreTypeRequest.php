<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTypeRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',

        ];
    }
    
    public function authorize()
    {
        return true;
    }
    
}