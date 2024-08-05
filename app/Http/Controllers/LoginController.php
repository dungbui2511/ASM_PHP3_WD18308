<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $req)
    {
        return view('auth.login');
    }
    public function save(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($validated)) {
            $req->session()->regenerate();
            $user = Auth::user();
            if ($user->type == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->type == 'user') {
                return redirect()->intended('/');
            }
        }
        return redirect('auth.login');
    }
}
