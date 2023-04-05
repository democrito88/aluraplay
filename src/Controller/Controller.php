<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use League\Plates\Engine;

class Controller implements InterfaceController
{

    public const BASE_URL = "http://localhost:8080/public/index.php/";
    public const VIEW_PATH = __DIR__."/../../views/";
    protected $repository;
    protected EntityManager $entityManager;

    /**
     * @var League\Plates\Engine $templates
     */
    protected $templates;

    public function __construct(string $class)
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repository = $this->getEntityManager()->getRepository($class);
        $this->templates = new Engine(self::VIEW_PATH);
    }

    public function index()
    {
        require_once __DIR__ . "/../../views/error/404.html";
    }

    public function show(array $parametros)
    {
        require_once __DIR__ . "/../../views/error/404.html";
    }

    public function create()
    {
        require_once __DIR__ . "/../../views/error/404.html";
    }

    public function store()
    {
        require_once __DIR__ . "/../../views/error/404.html";
    }

    public function edit(array $parametros)
    {
        require_once __DIR__ . "/../../views/error/404.html";
    }

    public function update()
    {
        require_once __DIR__ . "/../../views/error/404.html";
    }

    public function delete(array $parametros)
    {
        require_once __DIR__ . "/../../views/error/404.html";
    }

    public function getRepository(): EntityRepository
    {
        return $this->repository;
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }
}
