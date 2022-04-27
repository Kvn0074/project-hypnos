<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compte::class;
    }


    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }



    public function configureFields(string $pageName): iterable
    {
        $nom = TextField::new('nom');
        $prenom = TextField::new('prenom');
        $email = EmailField::new('email');
        $roles = ChoiceField::new('roles', "ROLES")
            ->setChoices(["Gerant d'établissement" => 'ROLE_GERANT', 'Utilisateur' => 'ROLE_USER'])
            ->allowMultipleChoices(true);
        $password = TextField::new('password')
            ->setFormType(PasswordType::class);


        return [$nom, $prenom, $email, $roles, $password];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function encodePassword(Compte $compte) //encode automatiquement le mot de passe
    {
        if ($compte->getPassword() !== null) {
            $password = $this->hasher->hashPassword($compte, $compte->getPassword());

            $compte->setPassword($password);

        }

    }


}
