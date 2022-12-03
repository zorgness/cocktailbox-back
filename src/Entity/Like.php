<?php

namespace App\Entity;

use ApiPlatform\Metadata\Link;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LikeRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: LikeRepository::class)]
#[ApiResource()]
#[ORM\Table(name: '`user_like`')]
#[ApiResource(
  uriTemplate:'/users/{userId}/likes',
  uriVariables: [
    'userId' => new Link(fromClass: User::class, toProperty: 'account'),
  ],
  operations: [ new GetCollection() ]
)]
#[ApiFilter(SearchFilter::class, properties: ['idDrink' => 'exact'])]
#[ApiFilter(SearchFilter::class, properties: ['idDrink' => 'exact', 'account' => 'exact'])]
class Like
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $idDrink = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    private ?User $account = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAccount(): ?User
    {
        return $this->account;
    }

    public function setAccount(?User $account): self
    {
        $this->account = $account;

        return $this;
    }
}
