<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        $userId = $this->route('user')->id; // Get the ID of the user being updated

        return [
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone' => 'required|string|max:20|unique:users,phone,' . $userId,
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Make password nullable to allow updates without changing password
            'role_id' => 'nullable|exists:roles,id', // Validate that role_id exists in the roles table
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
