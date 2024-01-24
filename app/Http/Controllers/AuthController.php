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
$credentials = $request->only('email', 'password');

if (!$token = JWTAuth::attempt($credentials)) {
return response()->json(['error' => 'Unauthorized'], 401);
}

return response()->json(['token' => $token]);
}

public function signup(Request $request)
{
$user = new User([
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
