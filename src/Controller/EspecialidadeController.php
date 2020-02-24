<?php

namespace App\Controller;

use App\Controller\Abs\AbstractBaseController;
use App\Helper\Factory\EspecialidadeFactory;
use App\Entity\Especialidade;
use App\Repository\EspecialidadeRepository;
use Doctrine\ORM\EntityManagerInterface;

class EspecialidadeController extends AbstractBaseController
{
    public function __construct(
        EspecialidadeRepository $repository, EntityManagerInterface $entityManager, EspecialidadeFactory $factory
    )
    {
        parent::__construct($repository, $entityManager, $factory);
    }
    /**
     * @param Especialidade $entityOld
     * @param Especialidade $entityNew
     */
    public function updateEntity($entityOld, $entityNew)
    {
        $entityOld->setDescricao($entityNew->getDescricao());
    }
}