<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_type' => 'required|in:customer,restaurant_owner,delivery_driver',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required',
            'phone_number' => 'nullable',
            'address' => 'nullable',
            // Add validation rules for other fields
        ]);

        // Create a new user
        $user = User::create($validatedData);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
    
            return response()->json(['message' => 'Login successful', 'user' => $user, 'access_token' => $token]);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
