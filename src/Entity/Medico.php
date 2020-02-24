<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="medicos")
 */
class Medico implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $registro;
    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    public function getId(): int
    {
        return $this->id;
    }

    public function getRegistro(): int
    {
        return $this->registro;
    }

    public function setRegistro($registro): Medico
    {
        $this->registro = $registro;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome($nome): Medico
    {
        $this->nome = $nome;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => self::getId(),
            'registro' => self::getRegistro(),
            'nome' => self::getNome()
        ];
    }
}