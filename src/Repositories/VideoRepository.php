<?php

namespace Alura\Mvc\Repositories;

use Alura\Mvc\Entity\Video;
use PDO;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    private function getPDO()
    {
        return $this->pdo;
    }

    public function add(Video $video)
    {
        $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
        $statement = $this->getPDO()->prepare($sql);
        $statement->bindValue(1, $video->getUrl());
        $statement->bindValue(2, $video->getTitulo());

        $statement->execute();
    }

    public function find(int $id): Video
    {
        if ($id > 0) {
            $sql = 'SELECT * FROM videos WHERE id = ?';
            $statement = $this->getPDO()->prepare($sql);
            $statement->bindValue(1, $id);

            if ($statement->execute()) {
                $resultados = $statement->fetchAll()[0];
                $video = new Video($resultados['url'], $resultados['titulo'], $resultados['id']);
                return $video;
            }
        }

        throw new \PDOException("Id inválido.");
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM videos';
        $statement = $this->getPDO()->query($sql);
        
        if($statement->execute()){
            return $statement->fetchAll();
        }

        throw new \PDOException();
    }

    private function remove(int $id)
    {
        if($id > 0){
            $sql = "DELETE FROM videos WHERE id = ?";
            $statement = $this->getPDO()->prepare($sql);
            $statement->bindValue(1, $id);

            if(!$statement->execute()){
                throw new \PDOException("vídeo não removido");
            }
        }else{
            throw new \PDOException("Id inválido");
        }
    }
}
