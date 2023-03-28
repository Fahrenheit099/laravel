<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\ToDoController;

class AuthenticateController extends Controller
{
    public function login(AuthFormRequest $request)
    {
        $data = $request->all();
        $remember = $request->has('remember');

        if (Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']],
            $remember))
        {
            return redirect()->intended('/todolist');
        }

        return redirect()->route('auth_index')->withErrors('Invalid user email or password.');
    }

    public function store(RegFormRequest $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {
            Auth::attempt([
                'email' => $data['email'],
                'password' => $data['password'],
            ], false);

            app('redirect')->setIntendedUrl('/todolist');
            return redirect()->intended('/');
        }

        return redirect()->route('reg_form')->withErrors('Invalid user registration.');
    }
}