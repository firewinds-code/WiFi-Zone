<?php

namespace App\Actions\Fortify;

use App\Models\User;
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
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'user_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'location' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'], // Add phone number validation
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Get the user's IP address
        $userIP = request()->ip();

        // Create a new user with IP address
        return User::create([
            'user_name' => $input['user_name'],
            'name' => $input['name'],
            'gender' => $input['gender'],
            'location' => $input['location'],
            'email' => $input['email'],
            'phone' => $input['phone'], // Add phone number to the creation process
            'password' => Hash::make($input['password']),
            'ip_address' => $userIP, // Store the user's IP address
        ]);
    }
}