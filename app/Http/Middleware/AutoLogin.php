<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Models\User;

class AutoLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si le cookie "remember_token" est présent dans la requête
        if ($request->hasCookie('remember_token')) {
            $rememberToken = $request->cookie('remember_token');

            // Décrypter le token seulement s'il n'est pas vide
            if (!empty($rememberToken)) {
                try {
                    $decryptedToken = Crypt::decryptString($rememberToken);
                } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                    // Si le déchiffrement échoue, supprimez le cookie et redirigez l'utilisateur vers la page d'accueil
                    return redirect('/')->withCookie(\Illuminate\Support\Facades\Cookie::forget('remember_token'));
                }

                // Rechercher l'utilisateur par le remember_token
                $user = User::where('remember_token', $decryptedToken)->first();

                if ($user) {
                    // Authentifier l'utilisateur
                    Auth::login($user);
                }
            }
        }

        return $next($request);
    }
}
