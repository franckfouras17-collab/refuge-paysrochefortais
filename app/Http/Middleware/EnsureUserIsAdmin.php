<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Réserve l'accès au rôle admin (contenu du site en général).
     * Le rôle "utilisateur" n'a accès qu'aux fiches chiens — voir les
     * routes du groupe "dogs", en dehors de ce middleware.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()?->isAdmin()) {
            abort(403, "Accès réservé à l'administrateur.");
        }

        return $next($request);
    }
}
