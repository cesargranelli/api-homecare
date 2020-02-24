<?php

namespace App\Controller;

use App\Controller\Abs\AbstractBaseController;
use App\Helper\Factory\MedicoFactory;
use App\Entity\Medico;
use App\Repository\MedicoRepository;
use Doctrine\ORM\EntityManagerInterface;

class MedicoController extends AbstractBaseController
{
    public function __construct(
        MedicoRepository $repository, EntityManagerInterface $entityManager, MedicoFactory $factory
    )
    {
        parent::__construct($repository, $entityManager, $factory);
    }
    /**
     * @param Medico $entityOld
     * @param Medico $entityNew
     */
    public function updateEntity($entityOld, $entityNew)
    {
        $entityOld->setRegistro($entityNew->getRegistro())->setNome($entityNew->getNome());
    }
}