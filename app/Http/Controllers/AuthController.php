<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Halaman login
    public function showLogin() {
        return view('login');
    }

    // Proses login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // Ambil user termasuk yang sudah dihapus
        $user = User::withTrashed()->where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'login_error' => 'Email atau password salah',
            ])->withInput();
        }

        // Cek apakah user sudah dihapus
        if ($user->trashed()) {
            return back()->withErrors([
                'login_error' => 'Akun Anda telah dinonaktifkan',
            ])->withInput();
        }

        // Login normal
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            if($role === 'admin') return redirect()->route('admin.dashboard');
            if($role === 'staff') return redirect()->route('staff.dashboard');
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'login_error' => 'Email atau password salah',
        ])->withInput();
    }

    // Halaman register
    public function showRegister() {
        return view('register');
    }

    // Proses register
    public function register(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email:rfc,dns',
                'regex:/^[a-zA-Z0-9._%+-]{5,}@gmail\.com$/',
                'max:255',
                'unique:users,email'
            ],

            'password' => 'required|string|confirmed|min:6',
        ], [
            'email.regex' => 'Email harus format valid (@gmail.com & minimal 5 karakter sebelum @)',
        ]);

        

        User::create([
            'name' => $request->name,
            'email' => strtolower($request->email), // 🔥 biar konsisten
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
