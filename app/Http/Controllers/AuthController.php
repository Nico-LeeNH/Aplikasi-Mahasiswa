<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
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

$user->save();

return response()->json(['message' => 'Successfully registered']);
}

}
