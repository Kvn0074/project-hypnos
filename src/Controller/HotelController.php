<?php

namespace App\Controller;

use App\Entity\Etablissement;
use App\Entity\Suite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/hotel/{slug}', name: 'app_hotel')]
    public function index($slug): Response
    {
        $etablissement = $this->entityManager->getRepository(Etablissement::class)->findOneBySlug($slug);
        $suites = $this->entityManager->getRepository(Suite::class)->findAll();

        if(!$etablissement) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('hotel/index.html.twig', [
            'etablissement' => $etablissement,
            'suites' => $suites
        ]);
    }

    #[Route('/hotel/{slug}/{nom_suite}', name: 'app_suite')]
    public function show($slug, $nom_suite): Response
    {
        $suite = $this->entityManager->getRepository(Suite::class)->findOneBySlug($nom_suite);
        $etablissement = $this->entityManager->getRepository(Etablissement::class)->findOneBySlug($slug);

        if(!$suite) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('hotel/suite.html.twig', [
            'suite' => $suite,
            'etablissement' => $etablissement
        ]);
    }
}
