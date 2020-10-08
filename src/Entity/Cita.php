<?php

namespace App\Entity;

use App\Repository\CitaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CitaRepository::class)
 */
class Cita
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity=Paciente::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Paciente;

    /**
     * @ORM\ManyToOne(targetEntity=Especialidad::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Especialidad;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPaciente(): ?Paciente
    {
        return $this->Paciente;
    }

    public function setPaciente(?Paciente $Paciente): self
    {
        $this->Paciente = $Paciente;

        return $this;
    }

    public function getEspecialidad(): ?Especialidad
    {
        return $this->Especialidad;
    }

    public function setEspecialidad(?Especialidad $Especialidad): self
    {
        $this->Especialidad = $Especialidad;

        return $this;
    }
}
