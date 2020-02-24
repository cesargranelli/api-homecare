<?php

namespace App\Helper\Factory;

use App\Entity\Medico;
use App\Helper\Factory\Int\EntityFactoryInterface;

class MedicoFactory implements EntityFactoryInterface
{
    public function createEntity(string $stringJson): ?object
    {
        $json = json_decode($stringJson);

        $medico = new Medico();

        return $medico->setNome($json->nome)->setRegistro($json->registro);
    }
}