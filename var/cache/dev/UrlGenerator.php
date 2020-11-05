<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    'accueil' => [[], ['_controller' => 'App\\Controller\\AccueilController::index'], [], [['text', '/']], [], []],
    'visiteur' => [[], ['_controller' => 'App\\Controller\\VisiteurController::index'], [], [['text', '/visiteur']], [], []],
    'visiteur/menu' => [[], ['_controller' => 'App\\Controller\\VisiteurController::menu'], [], [['text', '/visiteur/menu/']], [], []],
    'visiteur/consulter' => [[], ['_controller' => 'App\\Controller\\VisiteurController::consulter'], [], [['text', '/visiteur/consulter/']], [], []],
    'visiteur/renseigner' => [[], ['_controller' => 'App\\Controller\\VisiteurController::renseigner'], [], [['text', '/visiteur/renseigner']], [], []],
    'visiteur/saisirMois' => [[], ['_controller' => 'App\\Controller\\VisiteurController::saisirMois'], [], [['text', '/visiteur/saisirMois']], [], []],
    'comptable' => [[], ['_controller' => 'App\\Controller\\ComptableController::index'], [], [['text', '/comptable']], [], []],
    'comptable/menu' => [[], ['_controller' => 'App\\Controller\\ComptableController::menu'], [], [['text', '/comptable/menu/']], [], []],
    'comptable/suivre' => [[], ['_controller' => 'App\\Controller\\ComptableController::suivre'], [], [['text', '/comptable/suivre']], [], []],
    'comptable/valider' => [[], ['_controller' => 'App\\Controller\\ComptableController::valider'], [], [['text', '/comptable/valider']], [], []],
];
