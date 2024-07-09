<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'role_id' => 'required|exists:roles,id', // Validate that role_id exists in the roles table
        ];
    }
    
    public function authorize()
    {
        return true;
    }
    
}