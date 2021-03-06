<?php

namespace App\Controller;


use App\Entity\Etablissement;
use App\Entity\Suite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $etablissements = $this->entityManager->getRepository(Etablissement::class)->findAll();

        return $this->render('home/index.html.twig', [
            'etablissements' => $etablissements
        ]);
    }

    /* #[Route('/{slug}', name: 'app_hotel')]
    public function show($slug): Response
    {
        $etablissement = $this->entityManager->getRepository(Etablissement::class)->findOneBySlug($slug);
        $suites = $this->entityManager->getRepository(Suite::class)->findAll();

        if(!$etablissement) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/hotel.html.twig', [
            'etablissement' => $etablissement,
            'suites' => $suites
        ]);
    }

     #[Route('/{slug}', name: 'app_suite')]
    public function show($slug): Response
    {
        $suite = $this->entityManager->getRepository(Suite::class)->findOneBySlug($slug);

        if(!$suite) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/suite.html.twig', [
            'suite' => $suite
        ]);
    } */

}
