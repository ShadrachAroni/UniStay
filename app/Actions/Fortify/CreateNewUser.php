<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, mixed>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        try{

            // Handle student_id_card upload
            if (isset($input['student_id_card']) && $input['student_id_card']->isValid()) {
                $file = $input['student_id_card'];
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/documents'), $filename);
                $input['student_id_card'] = $filename;
            } else {
                $input['student_id_card'] = null;
            }

            // Handle national_id_card upload
            if (isset($input['national_id_card']) && $input['national_id_card']->isValid()) {
                $file = $input['national_id_card'];
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/documents'), $filename);
                $input['national_id_card'] = $filename;
            } else {
                $input['national_id_card'] = null;
            }

            Validator::make($input, [
                'Fname' => ['required', 'string', 'max:255'],
                'Lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['nullable', 'string', 'max:15', 'unique:users'],
                'address' => ['nullable', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255', Rule::in(['male', 'female'])],
                'role_id' => ['nullable', 'integer'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
                'student_id_card' => ['nullable', 'string', 'max:255'], // adding validation for file
                'national_id_card' => ['nullable', 'string', 'max:255'], // adding validation for file
            ])->validate();

            $user = User::create([
                'Fname' => $input['Fname'],
                'Lname' => $input['Lname'],
                'email' => $input['email'],
                'gender' => $input['gender'],
                'student_id_card' => $input['student_id_card'],
                'national_id_card' => $input['national_id_card'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'role_id' => $input['role_id'] ?? 2,
                'password' => Hash::make($input['password']),
            ]);

            session()->flash('message', 'Registration successful!');
            session()->flash('alert-type', 'success');

            return $user;
                    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    } 
}

