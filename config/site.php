<?php

return [

    /*
     * Bloque le site public derrière une page 503 sans bloquer /admin.
     * Lu via config() (pas env() directement) pour rester correct une
     * fois `php artisan config:cache` exécuté en production.
     */
    'maintenance_mode' => (bool) env('MAINTENANCE_MODE', false),

];
