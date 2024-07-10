<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = Auth::user()->id;

        return [
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|email|max:255|        unique:users,email,' . $userId,
            'phone' => 'required|string|max:15'. $userId,
            'address' => 'required|string|max:255',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'role_id' => 'nullable|exists:roles,id',
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }
}
