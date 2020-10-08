<?php

namespace App\Entity;

use App\Repository\PacienteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PacienteRepository::class)
 */
class Paciente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $dui;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $expediente;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefono;

    public function __toString() {
        return $this->nombre;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDui(): ?string
    {
        return $this->dui;
    }

    public function setDui(string $dui): self
    {
        $this->dui = $dui;

        return $this;
    }

    public function getExpediente(): ?string
    {
        return $this->expediente;
    }

    public function setExpediente(string $expediente): self
    {
        $this->expediente = $expediente;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }
}
