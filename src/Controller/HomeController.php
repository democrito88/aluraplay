<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use League\Plates\Engine;

class HomeController
{
    /**
     * @var League\Plates\Engine
     */
    private $templates;

    public const VIEW_PATH = __DIR__."/../../views/";
    public const BASE_URL = "http://localhost:8080/public/index.php/";

    public function __construct()
    {
        $this->templates = new Engine(self::VIEW_PATH);
        //parent::__construct(Video::class);
    }

    public function index()
    {
        $vC = new VideoController();
        $videos = $vC->getEntityManager()
        ->createQuery('SELECT v FROM Alura\Mvc\Entity\Video v')
        ->setMaxResults(3)
        ->setFirstResult(1)
        ->getResult();

        echo $this->templates->render('home', ['videos' => $videos, 'base_url' => self::BASE_URL]);
    }
}