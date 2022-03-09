<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class UserApiAuthData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }

    public static function rules(): array
    {
        return [
            'email' => ['required','email'],
            'password' => ['required', 'min:6', 'max:12'],
        ];
    }

    public static function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }
}
