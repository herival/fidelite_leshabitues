<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 */
class Vente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Produit1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Produit2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Produit3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Produit4;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?int
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(int $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getProduit1(): ?int
    {
        return $this->Produit1;
    }

    public function setProduit1(?int $Produit1): self
    {
        $this->Produit1 = $Produit1;

        return $this;
    }

    public function getProduit2(): ?int
    {
        return $this->Produit2;
    }

    public function setProduit2(?int $Produit2): self
    {
        $this->Produit2 = $Produit2;

        return $this;
    }

    public function getProduit3(): ?int
    {
        return $this->Produit3;
    }

    public function setProduit3(?int $Produit3): self
    {
        $this->Produit3 = $Produit3;

        return $this;
    }

    public function getProduit4(): ?int
    {
        return $this->Produit4;
    }

    public function setProduit4(?int $Produit4): self
    {
        $this->Produit4 = $Produit4;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
