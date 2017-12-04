<?php

class Article
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $status;

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
     * @throws Exception
     */
    public function setId(int $id): Article
    {
        // Throwable
        // -> Error
        // -> Exception
        if ($id < 1) {
            throw new Exception("Invalid value, id must be >= 1");
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
     */
    public function setName(string $name): Article
    {
        $this->name = $name;

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
     */
    public function setStatus(int $status): Article
    {
        $this->status = $status;

        return $this;
    }
}