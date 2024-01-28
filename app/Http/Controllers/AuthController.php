<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(LoginRequest $request) {
        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->is_verified) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return to_route('announce.index')->with('success', 'Vous êtes maintenant connecté.');
            }
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrect ou compte non vérifié'
        ])->onlyInput('email')->with('error', 'Si votre compte n\'a pas été validé, vérifiez votre boîte mail. Il est possible que le courrier sois dans les spams.');
    }

    public function register() {

        return view('auth.register');
    }

    public function doregister(RegisterRequest $request) {

        if($request->validated('password') == $request->validated('verif_password')) {
            $user = $request->validated();
            $password = Hash::make($user['password']);
            $verified_password = Hash::make($user['verif_password']);
            $registration_token = str_replace(['$', '/', '\\'], '', bcrypt(uniqid()));

            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $password,
                'registration_token' => $registration_token,
                'avatar' => 'default.jpg',
                'description' => '',
                'is_verified' => 0
            ]);
            $role = Role::findByName('user');
            $newUser->assignRole($role);

            Mail::send(new RegistrationMail($newUser));

            return to_route('login')->with('success', 'Inscription réussie ! Pour vous connecter, vérifiez vos messages.');
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

    public function validation(Request $request) {
        $token = $request->route('token');

        $user = User::where('registration_token', $token)->first();

        if($user) {
            $user->update([
                'is_verified' => 1,
            ]);

        return to_route('login')->with('success', 'Le compte à bien été validé. Inscription terminée.');
        }

        return to_route('login')->with('error', 'Aucun utilisateur trouvé avec le token spécifié.');

    }
}
