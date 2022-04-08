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
           TextField::new('nom'),
           SlugField::new('slug')->setTargetFieldName('nom'),
           TextField::new('adresse'),
           TextField::new('ville'),
           IntegerField::new('code_postale'),
           TextField::new('description_intro'),
           TextareaField::new('description'),
           ImageField::new('photo')
               ->setBasePath('uploads/files')
               ->setUploadDir('public/uploads/files')
        ];
    }

}
