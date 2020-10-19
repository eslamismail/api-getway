<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6',
        ]);

        $data = $request->only(['email', 'password']);
        if (auth()->attempt($data)) {
            $user = auth()->user();
            $tokenResult = $user->createToken('api');

            $data = [
                'token' => $tokenResult->accessToken,
                'user' => $user,
            ];

            return response()->json($data, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    public function user(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|min:2|max:255',
            'password' => 'required|min:6',
        ]);
        $data = $request->only(['email', 'name']);
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $tokenResult = $user->createToken('api');
        $data = [
            'token' => $tokenResult->accessToken,
            'user' => $user,
        ];

        return response()->json($data, 200);
    }
}
