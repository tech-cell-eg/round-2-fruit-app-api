<?php

namespace App\Http\Controllers\Dashboard;

use App\Enum\Roles;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function registerView() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        $admin = $request->validated();
        $admin['password'] = Hash::make($admin['password']);
        $admin['role'] = 'admin';
//        dd($admin);
        if (User::create($admin)) {
            return redirect()->route('login.view')->with('success', 'you are registered successfully');
        }
        return redirect()->back()->withErrors(['error' => 'something went wrong']);
    }

    public function loginView() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::guard()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }
        return back()->withErrors(['error' => 'The provided credentials do not match our records.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }

}
