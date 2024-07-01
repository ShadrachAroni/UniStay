<?php

namespace App\Http\Requests\properties;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePropertyRequest extends FormRequest
{
    
    public function rules()
    {
        return [
          

        ];
    }
    
    public function authorize()
    {
        return true;
    }
    
}