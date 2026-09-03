<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    /**
     * Bloque l'accès public au site (page de garde, 503, noindex) sans
     * bloquer l'espace admin, ni le site public pour un admin/utilisateur
     * déjà connecté (pour pouvoir visualiser le rendu réel des pages
     * pendant qu'on prépare le contenu). Activée via MAINTENANCE_MODE=true
     * dans .env (voir le README, section « Mode maintenance »).
     *
     * Enregistrée en fin de groupe "web" (voir bootstrap/app.php) : la
     * session doit déjà être démarrée pour que $request->user() soit
     * fiable ici.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bypassed = $request->is('admin', 'admin/*') || $request->user();

        if (config('site.maintenance_mode') && ! $bypassed) {
            return response()->view('errors.503', [], 503);
        }

        return $next($request);
    }
}
