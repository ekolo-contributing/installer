<?php

    namespace App\Controllers;

    use Ekolo\Framework\Bootstrap\Controller;
    use Ekolo\Framework\Http\Request;
    use Ekolo\Framework\Http\Response;

    class PagesController extends Controller {

        /**
         * Renvoi à la page d'accueil
         * @param Request $request L'instance de Ekolo\Framework\Http\Request
         * @param Response $response L'instance de Ekolo\Framework\Http\Response
         * @return void
         */
        public function index(Request $request, Response $response)
        {
            $response->render('pages.index', [
                'title' => 'Ekolo Framework'
            ]);
        }

    }