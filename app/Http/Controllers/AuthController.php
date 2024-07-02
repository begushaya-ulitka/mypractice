<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm(Request $request) {
        if (Auth::check()) {
            return redirect(route('index'));
        }
        return view('auth/signup');
    }

    public function showLoginForm(Request $request) {
        if (Auth::check()) {
            return redirect(route('index'));
        }
        return view('auth/signin');
    }

    public function register(Request $request) {
        if (!$request->email || !$request->password) {
            return redirect(route('register.form'))->withErrors([
                'errors' => 'Ошибка при регистрации пользователя' 
            ]);
        }

        if (User::where('email', '=', $request->email)->exists()) {
            return redirect(route('register.form'))->withErrors([
                'errors' => 'Указанный адрес электронной почты уже используется' 
            ]);
         }

        $user = new User([
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "name" => $request->name,
        ]);
        $user->save();

        $role = new UserRole([
            "user_id" => $user->id,
            "role_id" => Role::$USER_ID,
        ]);
        $role->save();

        Auth::login($user);
        return redirect(route('index'));
    }

    public function login(Request $request) {
        if (!$request->email || !$request->password) {
            return redirect(route('login.form'))->withErrors([
                'errors' => 'Заполните все поля!' 
            ]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('index'));
        }

        return back()->withErrors([
            'errors' => 'Ошибка при входе',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect(route('index'));
    }
}
