<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup', ['pageTitle' => 'Signup']);
    }
    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        Auth::login($user);

        return redirect('/');
    }
    public function showLoginForm()
    {
        return view('auth.login', ['pageTitle' => 'Login']);
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials'
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
