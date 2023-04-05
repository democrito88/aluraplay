<?php

use League\Plates\Engine;

$dbPath = (require_once "database.php")['path'];
$builder = new \DI\ContainerBuilder();
$builder->addDefinitions([
    //PDO::class => create(PDO::class)->constructor("sqlite:$dbPath"),
    Engine::class => function(){
        $templatePath = __DIR__."/../views";
        return new Engine($templatePath);
    }
]);

/**
 * @var \Psr\Container\ContainerInterface $container
 */
$container = $builder->build();

return $container;