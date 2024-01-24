<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }
    public function login(Request $request)
{
    $request->validate([
        'email'=>'required|string|email|',
        'password'=>'required|string',
    ]);
$credentials = $request->only('email', 'password');
$token = JWTAuth::attempt($credentials);
        
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

return response()->json(['token' => $token]);
}

public function signup(Request $request)
{
$user = User::create([
'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
]);

$request->validate([
    'name'=>'required|string|max:255',
    'email'=>'required|string|email|max:255|unique:users',
    'password'=>'required|string|min:6',
]);
return response()->json([
    'message' => 'User created successfully',
    'user' => $user
]);
$user->save();

return response()->json(['message' => 'Successfully registered']);
}

}
