<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultRepository::class)
 */
class Result
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $enter1;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $enter2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $res;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnter1(): ?string
    {
        return $this->enter1;
    }

    public function setEnter1(string $enter1): self
    {
        $this->enter1 = $enter1;

        return $this;
    }

    public function getEnter2(): ?string
    {
        return $this->enter2;
    }

    public function setEnter2(string $enter2): self
    {
        $this->enter2 = $enter2;

        return $this;
    }

    public function getRes(): ?string
    {
        return $this->res;
    }

    public function setRes(string $res): self
    {
        $this->res = $res;

        return $this;
    }
}
