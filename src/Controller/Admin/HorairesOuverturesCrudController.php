<?php

namespace App\Controller\Admin;

use App\Entity\HorairesOuvertures;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HorairesOuverturesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HorairesOuvertures::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('Jour'),
            TextField::new('Ouverture'),
            TextField::new('Fermeture'),
        ];
    }

}
