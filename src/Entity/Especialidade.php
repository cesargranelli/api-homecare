<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="especialidades")
 */
class Especialidade implements \JsonSerializable
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
    private $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): Especialidade
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => self::getId(),
            'descricao' => self::getDescricao()
        ];
    }
}