<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repositories\VideoRepository;
use PDO;
use SMAP\Infra\EntityManagerCreator;

class VideoController extends Controller
{
    private const ABSOLUTE_PATH = __DIR__."/../../repository/videos/";

    public function __construct()
    {
        parent::__construct(Video::class);
    }

    public function index()
    {
        $videos = $this->getRepository()->findAll();
        echo $this->templates->render('video/index', ['videos' => $videos, 'base_url' => self::BASE_URL]);
    }

    public function create()
    {
        $titulo = "Adicione um vídeo";
        require_once __DIR__."/../../views/video/form.php";
    }

    public function store()
    {
        $title = filter_input(INPUT_POST, "title");
        $url = filter_input(INPUT_POST, "url");
        $path = null;

        if($_FILES['path']['error'] === UPLOAD_ERR_OK){
            $safeFileName = pathinfo($_FILES['path']['name'], PATHINFO_BASENAME);
            
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($_FILES['path']['tmp_name']);

            if (str_starts_with($mimeType, 'image/')){
                $path = self::ABSOLUTE_PATH.$safeFileName;
                move_uploaded_file($_FILES['path']['tmp_name'], $path);
            }
        }

        $this->getEntityManager()->persist(new Video($url, $title, $safeFileName));
        $this->getEntityManager()->flush();

        header("Location: ".self::BASE_URL."video/index");
    }

    public function edit($parametros)
    {
        $titulo = "Edite um vídeo";
        $video = $this->repository->find($parametros['id']);
        require_once __DIR__."/../../views/video/form.php";
    }

    public function update()
    {
        $title = filter_input(INPUT_POST, "title");
        $url = filter_input(INPUT_POST, "url");
        $id = filter_input(INPUT_POST, "id");
        $path = null;

        if($_FILES['path']['error'] === UPLOAD_ERR_OK){
            $path = self::ABSOLUTE_PATH.$_FILES['path']['name'];
            move_uploaded_file($_FILES['path']['tmp_name'], $_FILES['path']['name']);
        }

        $video = $this->getRepository()->find($id);
        $video->setUrl($url);
        $video->setTitle($title);
        $video->setPath($path);
        $this->getEntityManager()->persist($video);
        $this->getEntityManager()->flush();

        header("Location: ".self::BASE_URL."video/index");
    }
}