<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Exemple de logique
        if (!$request->user() || !$request->user()->is_admin) {
            abort(403, 'Accès non autorisé.');
        }

        return $next($request);
    }
}
