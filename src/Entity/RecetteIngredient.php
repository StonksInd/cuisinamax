<?php

namespace App\Entity;

use App\Repository\RecetteIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteIngredientRepository::class)]
class RecetteIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'recetteIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ingredient $recette_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getRecetteId(): ?ingredient
    {
        return $this->recette_id;
    }

    public function setRecetteId(?ingredient $recette_id): static
    {
        $this->recette_id = $recette_id;

        return $this;
    }
}
