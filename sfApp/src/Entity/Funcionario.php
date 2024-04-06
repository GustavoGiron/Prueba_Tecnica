<?php

namespace App\Entity;

use App\Repository\FuncionarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuncionarioRepository::class)]
class Funcionario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $apellido = null;

    #[ORM\Column(length: 13)]
    private ?string $numeroid = null;

    #[ORM\Column(length: 100)]
    private ?string $contra = null;

    #[ORM\ManyToOne(targetEntity: Agencia::class, inversedBy: 'funcionarios')]
    private $agencia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getNumeroid(): ?string
    {
        return $this->numeroid;
    }

    public function setNumeroid(string $numeroid): static
    {
        $this->numeroid = $numeroid;

        return $this;
    }

    public function getContra(): ?string
    {
        return $this->contra;
    }

    public function setContra(string $contra): static
    {
        $this->contra = $contra;

        return $this;
    }
}
