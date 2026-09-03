<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    /**
     * Bloque l'accès public au site (page de garde, 503, noindex) sans
     * bloquer l'espace admin — pour pouvoir se connecter et préparer le
     * contenu avant l'ouverture au public. Activée via MAINTENANCE_MODE=true
     * dans .env (voir le README, section « Mode maintenance »).
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (config('site.maintenance_mode') && ! $request->is('admin', 'admin/*')) {
            return response()->view('errors.503', [], 503);
        }

        return $next($request);
    }
}
