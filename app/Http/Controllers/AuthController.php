<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('signin');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|string',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email'    => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
                'password.string'   => 'Password harus berupa teks',
            ]
        );

        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            // dd(auth()->check(), auth()->user());
            return response()->json([
                'status' => true,
                'message' => 'Login berhasil'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Email atau password salah'
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    
}
