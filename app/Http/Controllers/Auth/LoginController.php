<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            return redirect()->intended('/');
        }
        else {
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('login');
    }

}
