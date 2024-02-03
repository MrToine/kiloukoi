<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AutoLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si le cookie "remember_token" est présent dans la requête
        $rememberToken = $request->cookie('remember_token');

        if ($rememberToken) {
            // Rechercher l'utilisateur par le remember_token
            $user = User::where('remember_token', $rememberToken)->first();

            if ($user) {
                // Authentifier l'utilisateur
                Auth::login($user);
            }
        }

        return $next($request);
    }
}
