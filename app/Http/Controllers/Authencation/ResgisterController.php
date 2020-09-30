<?php

namespace App\Http\Controllers\Authencation;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class ResgisterController extends Controller
{
    protected function show()
    {
        return view('auth.register');
    }

    protected function create(RegisterRequest $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'avatar' => $data['avatar'],
            'role_id' => config('setting.role.admin'),
        ]);

        return redirect()->route('user.login');
    }

}
