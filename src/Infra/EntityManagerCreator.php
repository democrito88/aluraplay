<?php

namespace Alura\Mvc\Infra;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Tools\DsnParser;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;

        $databaseParams = require_once __DIR__."/../../config/database.php";
        $sqlPlatform = new SqlitePlatform();
        $options = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__.'/../../banco.sqlite',
            'platform' => $sqlPlatform,
        ];

        $config = ORMSetup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        
        return EntityManager::create($options, $config);
    }
}