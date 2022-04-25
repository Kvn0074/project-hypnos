<?php

namespace App\Controller\Admin;

use App\Entity\Etablissement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EtablissementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etablissement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('nom', "Nom de L'hotel"),
           SlugField::new('slug')->setTargetFieldName('nom'),
           TextField::new('adresse', "Adresse de l'établissement"),
           TextField::new('ville', "Ville"),
           IntegerField::new('code_postale', 'Code postale'),
           TextField::new('description_intro',"Introduction de la description"),
           TextareaField::new('description', 'Description'),
           ImageField::new('photo', "Photo de l'établissement")
               ->setBasePath('uploads/files')
               ->setUploadDir('public/uploads/files')
        ];
    }

}
