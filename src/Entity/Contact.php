<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $AdresseMail = null;

    #[ORM\Column(length: 255)]
    private ?string $NumeroTel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Message = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Entreprise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->AdresseMail;
    }

    public function setAdresseMail(string $AdresseMail): static
    {
        $this->AdresseMail = $AdresseMail;

        return $this;
    }

    public function getNumeroTel(): ?string
    {
        return $this->NumeroTel;
    }

    public function setNumeroTel(string $NumeroTel): static
    {
        $this->NumeroTel = $NumeroTel;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->Entreprise;
    }

    public function setEntreprise(?string $Entreprise): static
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }
}
