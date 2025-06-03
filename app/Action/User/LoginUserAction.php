<?php

namespace App\Action\User;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUserAction
{
    public function execute($request): string
    {
        $user = User::where('email', $request['email'])->first();

        if (! $user || ! Hash::check($request['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('auth_token')->plainTextToken;
    }
}

