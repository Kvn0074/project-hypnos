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
            TextField::new('nom'),
            SlugField::new('slug')->setTargetFieldName('nom'),
            TextField::new('description_intro'),
            TextareaField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR'),
            ImageField::new('photo_principale')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files'),
            ImageField::new('photo_deux')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files'),
            ImageField::new('photo_3')
                ->setBasePath('uploads/files')
                ->setUploadDir('public/uploads/files'),
            UrlField::new('url_booking'),
            AssociationField::new('id_hotel')
        ];
    }

}
