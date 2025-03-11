<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'index', 'profile'
        ]);
    }

    public function index()
    {
        return view('users.list', [
            'users' => User::paginate(Controller::DEFAULT_PAGE_SIZE),
        ]);
    }
    public function profile()
    {
        return view('users.profile');
    }

    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'nick_name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        $player = new Player();
        $player->name = $request->name;
        $player->nick_name = $request->nick_name;
        $user->player()->save($player);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('playerAnimals.list')
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('users.login')
            ->withSuccess('You have logged out successfully!');
    }
}
