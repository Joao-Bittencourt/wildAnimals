<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register() {
        return view('users.register');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('playerAnimals.list')
                        ->withSuccess('You have successfully registered & logged in!');
    }

    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('playerAnimals.list')
                            ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
                    'email' => __('messages.login_invalid_credentials'),
                ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('users.login')
                        ->withSuccess('You have logged out successfully!');
        ;
    }

}
