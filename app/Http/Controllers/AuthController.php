<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

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

    public function doregister(RegisterRequest $request) {

        if($request->validated('password') == $request->validated('verif_password')) {
            $user = $request->validated();
            $password = Hash::make($user['password']);
            $verified_password = Hash::make($user['verif_password']);
            $registration_token = Hash::make($user['email']);

            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $password,
                'registration_token' => $registration_token,
                'avatar' => 'default.jpg',
            ]);
            $role = Role::findByName('user');
            $newUser->assignRole($role);

            dd('vérifie la bdd');
        }

        return back()->withErrors([
            'password' => 'Les mots de passe ne correspondent pas',
            'verif_password' => 'Les mots de passe ne correspondent pas'
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return to_route('login')->with('success', 'Déconnexion réalisée avec succès');
    }
}
