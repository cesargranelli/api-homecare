<?php

namespace App\Controller;

use App\Entity\Doctor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctorController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * DoctorController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route(path="/doctors", methods={"post"})
     * @param Request $request
     * @return Response
     */
    public function add(Request $request): Response
    {
        $contentBody = json_decode($request->getContent());
        $doctor = new Doctor($contentBody->crm, $contentBody->name);
        $this->entityManager->persist($doctor);
        $this->entityManager->flush();
        return new JsonResponse($doctor);
    }

    /**
     * @Route(path="/doctors", methods={"get"})
     * @return Response
     */
    public function all(): Response
    {
        $doctorRepository = $this->getDoctrine()->getRepository(Doctor::class);
        return new JsonResponse($doctorRepository->findAll());
    }

    /**
     * @Route(path="/doctors/{id}", methods={"get"})
     * @param $id
     * @return Response
     */
    public function find($id): Response
    {
        $doctorRepository = $this->getDoctrine()->getRepository(Doctor::class);
        return new JsonResponse($doctorRepository->find($id));
    }

    /**
     * @Route(path="/doctors", methods={"put"})
     * @param Request $request
     * @return Response
     */
    public function save(Request $request): Response
    {
        $contentBody = json_decode($request->getContent());
        $doctorRepository = $this->getDoctrine()->getRepository(Doctor::class);
        $doctor = $doctorRepository->find($contentBody->id);
        $doctor->name = $contentBody->name;
        $this->entityManager->persist($doctor);
        $this->entityManager->flush();
        return new JsonResponse($doctor);
    }

    /**
     * @Route(path="/doctors/{id}", methods={"delete"})
     * @param $id
     * @return Response
     */
    public function delete($id): Response
    {
        $doctorRepository = $this->getDoctrine()->getRepository(Doctor::class);
        $doctor = $doctorRepository->find($id);
        $this->entityManager->remove($doctor);
        $this->entityManager->flush();
        return new JsonResponse(null, Response::HTTP_ACCEPTED);
    }

}