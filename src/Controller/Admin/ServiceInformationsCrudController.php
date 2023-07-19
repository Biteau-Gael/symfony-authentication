<?php

namespace App\Controller\Admin;

use App\Entity\ServiceInformations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceInformationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceInformations::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('services'),
            TextField::new('Email'),
            TextField::new('Telephone'),

        ];
    }

}
