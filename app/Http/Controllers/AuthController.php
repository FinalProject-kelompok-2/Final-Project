<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login() {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.home');
            }
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }

    public function login_action(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        try {
            $find = User::where('email', $validation['email'])->first();
            $checkPass = $find ? Hash::check($validation['password'], $find->password) : false;
            if (!$find) {
                return redirect()->route('login')->with('error', 'Email salah / tidak terdaftar');
            } elseif (!$checkPass) {
                return redirect()->route('login')->with('error', 'Password salah');
            }

            Auth::login($find);
            if (Auth::user()->role == 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                return redirect()->intended(route('user.home'));
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    function register() {
        return view('auth.register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                return redirect()->route('register')->with('error', 'Email sudah terdaftar');
            }
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(10),
                'role' => 'user',
            ]);

            $user->userDetail()->create();

            return redirect()->route('login')->with('success', 'Registrasi Berhasil');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
