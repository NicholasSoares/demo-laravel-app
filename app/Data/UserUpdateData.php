<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class UserUpdateData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required','email'],
        ];
    }

    public static function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
        ];
    }
}
