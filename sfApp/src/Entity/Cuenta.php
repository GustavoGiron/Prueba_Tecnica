<?php

namespace App\Entity;

use App\Repository\CuentaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuentaRepository::class)]
class Cuenta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $saldo = null;

    #[ORM\Column(length: 1)]
    private ?string $estado = null;

    #[ORM\Column(length: 1)]
    private ?string $moneda = null;

    #[ORM\ManyToOne(targetEntity: Cliente::class, inversedBy: 'cuentas')]
    private $cliente;

    #[ORM\OneToMany(targetEntity: Transaccion::class, mappedBy: 'cuentax')]
    private $transacciones;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaldo(): ?float
    {
        return $this->saldo;
    }

    public function setSaldo(?float $saldo): static
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): static
    {
        $this->moneda = $moneda;

        return $this;
    }
}
