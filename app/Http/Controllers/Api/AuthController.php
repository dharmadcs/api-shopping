<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city'=> 'required|string',
            'country' => 'required|string',
            'name' => 'required|string', 
            'postcode' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'city'=> $request->city,
            'country' => $request->country,
            'name' => $request->name, 
            'postcode' => $request->postcode,
        ]);

        return response()->json([
            'message' => 'user created successfully',
            'user' => $user
        ]);
    }

    public function signin(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'signin successfully',
            'email' => $request->email,
            'token' => $token
        ]);
    }

    public function getAllUsers()
    {
        $users = User::latest()->get();
        return response()->json([
            'all users' => $users 
        ]);
    }

    public function signout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'signout successfully'
        ]);
    }
}