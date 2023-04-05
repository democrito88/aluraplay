<?php

declare(strict_types=1);

namespace Alura\Mvc\Entity;

use Doctrine\ORM\Mapping\{Entity,
    Table,
    Id,
    GeneratedValue,
    Column};

/**
 * @Entity
 * @Table(name="videos")
 */
class Video
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;
    
    /**
     * @Column(type="text")
     */
    private string $url;
    
    /**
     * @Column(type="text")
     */
    private string $title;

    /**
     * @Column(type="text")
     */
    private string|null $path;

    public function __construct(
        string $url,
        string $title,
        string $path = null,
        int $id = 0,
    )
    {       
        $this->setUrl($url);
        $this->setTitle($title);
        $this->setPath($path);
        $this->setId($id);
    }

    public function setUrl(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) == false) {
            throw new \InvalidArgumentException();
        }

        $this->url = $url;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the value of titulo
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of titulo
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of path
     *
     * @return string|null
     */
    public function getPath(): string|null
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @param string|null $path
     *
     * @return self
     */
    public function setPath(string|null $path): self
    {
        $this->path = $path;

        return $this;
    }
}