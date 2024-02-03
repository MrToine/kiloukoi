<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class RgpdMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->cookie('gdpr-consent')) {
            return response()->view('shared.rgpd')->cookie('gdpr-consent', 'true', 90);
        }

        return $next($request);
    }
}
