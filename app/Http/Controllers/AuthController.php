<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }

        return view('login');
    }

    public function loginAction(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($validator)) {
            return redirect(route('home'));
        }
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }

        return view('register');
    }

    public function registerAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $requestData = $request->only(['name', 'email', 'password']);

        $requestData['password'] = Hash::make($request->password);

        User::create($requestData);

        return redirect(route('login'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
