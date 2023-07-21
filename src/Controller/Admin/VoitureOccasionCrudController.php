<?php

namespace App\Controller\Admin;

use App\Entity\VoitureOccasion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VoitureOccasionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VoitureOccasion::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('marque'),
            TextField::new('modele'),
            IntegerField::new('annee'),
            TextField::new('prix'),
            IntegerField::new('Kilometre'),
            TextField::new('Caracteristiques'),
            TextField::new('Equipements'),
        ];
    }

}
