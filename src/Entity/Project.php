<?php
namespace App\Entity;

class Project
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
     * @var string
     */
    private $description;
    /**
     * @var string[]
     */
    private $languages;
    /**
     * @var string
     */
    private $image;
    /**
     * @var \DateTime
     */
    private $startedAt;
    /**
     * @var \DateTime
     */
    private $finishedAt;

    public function __construct()
    {
        $this->setStartedAt(new \DateTime($this->startedAt));
        $this->setFinishedAt(new \DateTime($this->finishedAt));
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Project
     */
    public function setId(int $id): Project
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName(string $name): Project
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Project
     */
    public function setDescription(string $description): Project
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getLanguages(): ?array
    {
        return $this->languages;
    }

    /**
     * @param string[] $languages
     * @return Project
     */
    public function setLanguages(array $languages): Project
    {
        $this->languages = $languages;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Project
     */
    public function setImage(string $image): Project
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartedAt(): \DateTime
    {
        return $this->startedAt;
    }

    /**
     * @param \DateTime $startedAt
     * @return Project
     */
    public function setStartedAt(\DateTime $startedAt): Project
    {
        $this->startedAt = $startedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFinishedAt(): ?\DateTime
    {
        return $this->finishedAt;
    }

    /**
     * @param \DateTime $finishedAt
     * @return Project
     */
    public function setFinishedAt(\DateTime $finishedAt): Project
    {
        $this->finishedAt = $finishedAt;
        return $this;
    }
}
