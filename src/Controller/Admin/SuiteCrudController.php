<?php

namespace App\Controller\Admin;

use App\Entity\Suite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class SuiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Suite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', 'Nom de la suite'),
            SlugField::new('slug')->setTargetFieldName('nom'),
            TextField::new('description_intro', 'Introduction de la description'),
            TextareaField::new('description','Description'),
            MoneyField::new('prix', 'Prix par nuit (ne pas mettre le sigle €)')->setCurrency('EUR'),
            ImageField::new('photo_principale', 'Photo principale')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files'),
            ImageField::new('photo_deux', 'Deuxième photo')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files'),
            ImageField::new('photo_3', 'Troisième photo')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files'),
            UrlField::new('url_booking', 'Lien Booking.com'),
            AssociationField::new('id_hotel', "Nom de l'hotel")
        ];
    }

}
