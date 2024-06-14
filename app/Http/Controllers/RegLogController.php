<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegLogController extends Controller
{
    public function create()
    {
        return view("register");
    }

    public function edit()
    {
        return view("login");
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'required|string',
            'login' => 'required|string|unique:users,login',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|string|min:4|confirmed',
        ]);
        User::create(array_merge($data, ['role_id' => 1, 'password' => bcrypt($request->password)]));
        $credentials = $request->only('login', 'password');

        Auth::attempt($credentials, true);

        $request->session()->regenerate();

        return redirect('/zapis');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string|exists:users,login',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('login', 'password');
        if (!Auth::attempt($credentials, true))
            return back()->withInput()->withErrors(['login' => 'Неверный логин или пароль']);
        $request->session()->regenerate();
        return redirect('/zapis');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/zapis');
    }
}
