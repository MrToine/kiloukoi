<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RecuperationRequest;
use App\Http\Requests\PasswordResetRequest;

use App\Models\User;
use App\Models\TemporaryToken;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\Mail\RecuperationMail;

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
                if($request->input('always_connected') == true) {
                    $user->remember_token = Str::random(60);
                    $user->save();

                    $rememberCookie = Cookie::make('remember_token', $user->remember_token, 60 * 24 * 365);
                    return redirect()->back()->with('success', 'Vous êtes maintenant connecté.')->withCookie($rememberCookie);
                }
                $request->session()->regenerate();

                return redirect()->back()->with('success', 'Vous êtes maintenant connecté.');
            }
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrect ou compte non vérifié'
        ])->onlyInput('email')->with('error', 'Si votre compte n\'a pas été validé, vérifiez votre boîte mail. Il est possible que le courrier soit dans les spams. Vérifier bien vous courrier indésirables.');
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

            return to_route('login')->with('success', 'Inscription réussie ! Pour vous connecter, vérifiez vos messages.  Il est possible que le courrier soit dans les spams. Vérifier bien vous courrier indésirables.');
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

    public function recuperation_password() {
        return view('auth.recuperation_password');
    }

    public function dorecuperation_password(RecuperationRequest $request) {
        $credentials = $request->validated();
        $user = User::where('email', $credentials['email'])->first();

        if($user) {
            $token = TemporaryToken::create([
                'user_id' => $user->id,
                'token' => Str::random(60),
            ]);

            Mail::send(new RecuperationMail($user, $token->token));
        }

        return to_route('recuperation_password')->with('success', 'Si cet email existe, vous aller recevoir un message afin de modifier votre mot de passe.');
    }

    public function recuperation_password_check(Request $request) {
        $token = TemporaryToken::where('token', $request->token)->first();

        if (!$token) {
            return abort(404);
        }

        return view('auth.password_reset', ['token' => $token]);
    }

    public function dorecuperation_password_check(PasswordResetRequest $request) {
        $token = TemporaryToken::where('token', $request->token)->first();

        if (!$token) {
            return abort(404);
        }

        if($request->validated('password') == $request->validated('verif_password')) {
            $user = User::find($token->user_id);
            $user->password = Hash::make($request->password);
            $user->save();

            $token->delete();

            return to_route('login')->with('success', 'Mot de passe modifié avec succès ! Vous pouvez maintenant vous connecter.');
        }

        return back()->withErrors([
            'password' => 'Les mots de passe ne correspondent pas',
            'verif_password' => 'Les mots de passe ne correspondent pas'
        ]);
    }
}
