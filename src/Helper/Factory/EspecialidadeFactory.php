<?php

namespace App\Helper\Factory;

use App\Entity\Especialidade;
use App\Helper\Factory\Int\EntityFactoryInterface;

class EspecialidadeFactory implements EntityFactoryInterface
{
    public function createEntity(string $stringJson): ?object
    {
        $json = json_decode($stringJson);

        $especialidade = new Especialidade();

        return $especialidade->setDescricao($json->descricao);
    }
}