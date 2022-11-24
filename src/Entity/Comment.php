<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ApiResource()]
#[ApiFilter(SearchFilter::class, properties: ['idDrink' => 'exact'])]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column(options:["default" =>  0])]
    private ?int $rating = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?User $account = null;

    #[ORM\Column(length: 255)]
    private ?string $idDrink = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getAccount(): ?User
    {
        return $this->account;
    }

    public function setAccount(?User $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getIdDrink(): ?string
    {
        return $this->idDrink;
    }

    public function setIdDrink(string $idDrink): self
    {
        $this->idDrink = $idDrink;

        return $this;
    }
}
