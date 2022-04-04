<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->EntityManager = $entityManager;
    }

    #[Route('/register', name: 'app_register')]
    public function index(Request $request, UserPasswordHasherInterface $hasher): Response
    {
        $compte = new Compte();
        $form = $this->createForm(RegisterType::class, $compte);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $compte = $form->getData();

            $password = $hasher->hashPassword($compte, $compte->getPassword());

            $compte->setPassword($password);

            $this->EntityManager->persist($compte);
            $this->EntityManager->flush();

        }
        return $this->render('register/index.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
