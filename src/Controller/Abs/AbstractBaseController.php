<?php

namespace App\Controller\Abs;

use App\Helper\Factory\Int\EntityFactoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractBaseController extends AbstractController
{
    /**
     * @var ObjectRepository
     */
    protected $repository;
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    /**
     * @var EntityFactoryInterface
     */
    protected $factory;

    public function __construct(ObjectRepository $repository, EntityManagerInterface $entityManager, EntityFactoryInterface $factory)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->factory = $factory;
    }

    public function add(Request $request): Response
    {
        $entity = $this->factory->createEntity($request->getContent());
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        return new JsonResponse($entity, Response::HTTP_OK);
    }

    public function all(): Response
    {
        return new JsonResponse($this->repository->findAll(), Response::HTTP_OK);
    }

    public function find(int $id): Response
    {
        return new JsonResponse($this->repository->find($id), Response::HTTP_OK);
    }

    public function save(int $id, Request $request): Response
    {
        $entityNew = $this->factory->createEntity($request->getContent());
        $entityOld = $this->repository->find($id);
        $this->updateEntity($entityOld, $entityNew);
        $this->entityManager->flush();
        return new JsonResponse($entityOld);
    }

    public function delete(int $id): Response
    {
        $entity = $this->repository->find($id);
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    abstract public function updateEntity($entityOld, $entityNew);
}