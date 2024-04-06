<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $apellido = null;

    #[ORM\Column(length: 100)]
    private ?string $municipio = null;

    #[ORM\Column(length: 100)]
    private ?string $departamento = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $razon_social = null;

    #[ORM\Column(length: 13)]
    private ?string $numeroid = null;

    #[ORM\Column(length: 1)]
    private ?string $tipo_documento = null;

    #[ORM\Column(length: 100)]
    private ?string $contra = null;

    #[ORM\OneToMany(targetEntity: Cuenta::class, mappedBy: 'cliente')]
    private $cuentas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(string $municipio): static
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): static
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getRazonSocial(): ?string
    {
        return $this->razon_social;
    }

    public function setRazonSocial(?string $razon_social): static
    {
        $this->razon_social = $razon_social;

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

    public function getTipoDocumento(): ?string
    {
        return $this->tipo_documento;
    }

    public function setTipoDocumento(string $tipo_documento): static
    {
        $this->tipo_documento = $tipo_documento;

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



    public function getRoles(): array
    {
        return ['ROLE_USER']; // Puedes cambiar esto según tu lógica de roles
    }

    public function getPassword(): ?string
    {
        return $this->contra; // Suponiendo que tienes una propiedad 'contra' que almacena la contraseña
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername(): string
    {
        return $this->numeroid; // Suponiendo que tienes una propiedad 'numeroid' que almacena el nombre de usuario
    }

    public function eraseCredentials(): void
    {
        // Este método no es necesario en este caso
    }

    public function getUserIdentifier(): string
    {
        return $this->numeroid; // Suponiendo que 'numeroid' es el identificador del usuario
    }
}
