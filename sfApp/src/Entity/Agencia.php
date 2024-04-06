<?php

namespace App\Entity;

use App\Repository\AgenciaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgenciaRepository::class)]
class Agencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $locacion = null;

    #[ORM\OneToMany(targetEntity: Funcionario::class, mappedBy: 'agencia')]
    private $funcionarios;

    #[ORM\OneToMany(targetEntity: Transaccion::class, mappedBy: 'agenciax')]
    private $transaccionesx;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocacion(): ?string
    {
        return $this->locacion;
    }

    public function setLocacion(string $locacion): static
    {
        $this->locacion = $locacion;

        return $this;
    }
}
