<?php

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";

/*
session_start();
if (isset($_SESSION['logado'])) {
    $originalInfo = $_SESSION['logado'];
    unset($_SESSION['logado']);
    session_regenerate_id();
    $_SESSION['logado'] = $originalInfo;
}
*/

if (array_key_exists('REQUEST_URI', $_SERVER)) {

    $partes = explode("/", $_SERVER['REQUEST_URI']);
    $controller = $partes[count($partes) - 2];
    $metodoNaoFormatado = $partes[count($partes) - 1];
    $metodo = explode("?", $metodoNaoFormatado)[0];

    if(str_contains($metodoNaoFormatado, "?")){

        $stringParametros = explode("?", $metodoNaoFormatado)[1];
        $parametros = [];
        
        foreach (explode("&", $stringParametros) as $value) {
            $parametros[explode("=", $value)[0]] = explode("=", $value)[1];
        }
    }
    
    $rotas = include_once __DIR__."/../config/routes.php";

    switch ($metodo) {
        case '':
        case 'index':
            (new $rotas[$controller]() )->index();
            break;
        case 'show':
            (new $rotas[$controller]() )->show($parametros);
            break;
        case 'create':
            (new $rotas[$controller]() )->create();
            break;
        case 'store':
            (new $rotas[$controller]() )->store();
            break;
        case 'edit':
            (new $rotas[$controller]() )->edit($parametros);
            break;
        case 'update':
            (new $rotas[$controller]() )->update();
            break;
        case 'delete':
            (new $rotas[$controller]() )->delete($parametros);
            break;
        case 'login':
            (new $rotas[$controller]() )->login();
            break;
        case 'validar':
            (new $rotas[$controller]() )->validate();
            break;
        case 'logout':
            (new $rotas[$controller]() )->logout();
            break;
        default:
            require_once __DIR__ . "/../views/error/404.html";
            break;
    }
}
