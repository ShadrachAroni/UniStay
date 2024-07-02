<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'Fname' => ['required', 'string', 'max:255'],
            'Lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:15', 'unique:users'], // phone validation
            'address' => ['nullable', 'string', 'max:255'], // address validation
            'gender' => ['required', 'string', 'max:255'], 
            'role_id' => ['nullable', 'integer'], // role_id validation
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'Fname' => $input['Fname'],
            'Lname' => $input['Lname'],
            'email' => $input['email'],
            'gender'=> $input['gender'],
            'student_id_card' => $input['student_id_card'] ?? null,
            'national_id_card' => $input['national_id_card'] ?? null,
            'phone' => $input['phone'] ?? null,
            'address' => $input['address'] ?? null,
            'role_id' => $input['role_id'] ?? 2,
            'password' => Hash::make($input['password']),
        ]);

        session()->flash('message', 'Registration successful!');
        session()->flash('alert-type', 'success');

        return $user;
    }
}
