<?php

namespace App\Http\Requests\properties;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
