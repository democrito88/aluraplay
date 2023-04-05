<?php

require_once __DIR__."/../vendor/autoload.php";

return [
    "login" => \Alura\Mvc\Controller\LoginController::class,
    "video" => \Alura\Mvc\Controller\VideoController::class,
    "home" => \Alura\Mvc\Controller\HomeController::class
];