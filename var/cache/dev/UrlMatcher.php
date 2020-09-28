<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'accueil', '_controller' => 'App\\Controller\\AccueilController::index'], null, null, null, false, false, null]],
        '/visiteur' => [[['_route' => 'visiteur', '_controller' => 'App\\Controller\\VisiteurController::index'], null, null, null, false, false, null]],
        '/visiteur/menu' => [[['_route' => 'visiteur/menu', '_controller' => 'App\\Controller\\VisiteurController::menu'], null, null, null, true, false, null]],
        '/visiteur/consulter' => [[['_route' => 'visiteur/consulter', '_controller' => 'App\\Controller\\VisiteurController::consulter'], null, null, null, true, false, null]],
        '/visiteur/saisir' => [[['_route' => 'visiteur/saisir', '_controller' => 'App\\Controller\\VisiteurController::saisir'], null, null, null, false, false, null]],
        '/visiteur/saisirMois' => [[['_route' => 'visiteur/saisirMois', '_controller' => 'App\\Controller\\VisiteurController::saisirMois'], null, null, null, false, false, null]],
        '/comptable' => [[['_route' => 'comptable', '_controller' => 'App\\Controller\\ComptableController::index'], null, null, null, false, false, null]],
        '/comptable/menu' => [[['_route' => 'comptable/menu', '_controller' => 'App\\Controller\\ComptableController::menu'], null, null, null, true, false, null]],
        '/comptable/suivre' => [[['_route' => 'comptable/suivre', '_controller' => 'App\\Controller\\ComptableController::suivre'], null, null, null, false, false, null]],
        '/comptable/valider' => [[['_route' => 'comptable/valider', '_controller' => 'App\\Controller\\ComptableController::valider'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
