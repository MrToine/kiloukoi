<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use App\Models\User;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(LoginRequest $request) {

        $credentials = $request->validated();
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('announce.index');
        }

        return back()->withErrors([
            'email' => 'Identifiant incorrect'
        ])->onlyInput('email');
    }

    public function register() {

        return view('auth.register');
    }

    public function logout() {
        Auth::logout();
        return to_route('login')->with('success', 'Déconnexion réalisée avec succès');
    }
}
