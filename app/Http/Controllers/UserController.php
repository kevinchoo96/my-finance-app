<?php

namespace App\Http\Controllers;

use App\Action\User\LoginUserAction;
use App\Action\User\RegisterNewUserAction;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        (new RegisterNewUserAction)->execute($request->validated());

        return response()->json(['message' => 'Success']);
    }

    public function login(UserRequest $request)
    {
        $token = (new LoginUserAction)->execute($request->validated());

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}

