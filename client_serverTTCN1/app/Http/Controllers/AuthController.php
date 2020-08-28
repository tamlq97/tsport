<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token =  $user->createToken('authToken')->accessToken;
            $cookie = $this->getCookieDetails($token);
            return response()
                ->json([
                    'logged_in_user' => $user,
                    'token' => $token,
                ], 200)
                ->cookie($cookie['name'], $cookie['value'], $cookie['minutes'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly'], $cookie['samesite']);
        } else {
            return response()->json(
                ['error' => 'invalid-credentials'],
                422
            );
        }
    }
    public function register(Request $req)
    {
        $credentials = $this->validate($req, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:passwordConfirmation',
            'phone' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);
        $credentials['password'] = Hash::make($credentials['password']);
        $fullname = $credentials['fname'] . ' ' . $credentials['lname'];
        $user = \App\User::create([
            'email' => $credentials['email'],
            'name' => $fullname,
            'password' => $credentials['password']
        ]);
        if ($req->role) {
            $user->assignRole($req->role);
        } else $user->assignRole('customer');
        $user->profile()->create([
            'contact_fname' => $credentials['fname'],
            'contact_lname' => $credentials['lname'],
            'phone' => $credentials['phone'],
            'address' => $credentials['address'],
            'city' => $credentials['city'],
            'country' => $credentials['country'],
        ]);
        $user->customer()->create([
            'contact_fname' => $credentials['fname'],
            'contact_lname' => $credentials['lname'],
            'email' => $credentials['email'],
            'phone' => $credentials['phone'],
            'address' => $credentials['address'],
            'city' => $credentials['city'],
            'country' => $credentials['country'],
        ]);
        return response()->json(['message' => 'Successful create account.']);
    }
    private function getCookieDetails($token)
    {
        return [
            'name' => '_token',
            'value' => $token,
            'minutes' => 1440,
            'path' => null,
            'domain' => null,
            // 'secure' => true, // for production
            'secure' => null, // for localhost
            'httponly' => true,
            'samesite' => true,
        ];
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $cookie = Cookie::forget('_token');
        return response()->json([
            'message' => 'successful-logout'
        ])->withCookie($cookie);
    }
}
