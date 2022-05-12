<?php

namespace App\Controller\Admin;

use App\Entity\Gerant;
use App\Entity\Compte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class GerantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gerant::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('id_hotel', "Nom de l'hotel"),
            AssociationField::new('id_compte', "Nom du gerant")
        ];
    }

}
