<?php
    $app = require __DIR__.'/bootstrap/app.php';

    use Ekolo\Framework\Bootstrap\Middleware;

    // Incudes des routes
    $pages = require './routes/pages.php';

    // Middleware d'erreurs
    $app->middleware('errors', function (Middleware $middleware) {
        $middleware->getError();
    });
    
    // Parsing des routes
    $app->use('/', $pages);

    // Permet de traquer les erreurs
    $app->trackErrors();