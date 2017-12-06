<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="article")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $slug;

    const STATUS_PUBLISHED   = 0;
    const STATUS_UNPUBLISHED = 1;
    const STATUS_DRAFT       = 2;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Article
     *
     * @throws \Exception
     */
    public function setId(int $id): Article
    {
        // Throwable
        // -> Error
        // -> Exception
        if ($id < 1) {
            throw new \Exception("Invalid value, id must be >= 1");
        }

        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Article
     *
     * @throws \Exception
     */
    public function setName(string $name): Article
    {
        if (empty($name)) {
            throw new \Exception("Article name cannot be empty.");
        }

        $this->name = $name;

        /* START Slug */
        $this->setSlug($name);
        /* END Slug */

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return Article
     *
     * @throws \Exception
     */
    public function setStatus(int $status): Article
    {
        if (!in_array($status, self::getStatuses())) {
            throw new \Exception("Status value not valid");
        }

        $this->status = $status;

        return $this;
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_DRAFT,
            self::STATUS_UNPUBLISHED,
            self::STATUS_PUBLISHED,
        ];
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return Article
     */
    public function setSlug(string $slug)
    {
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($slug);

        return $this;
    }


}
