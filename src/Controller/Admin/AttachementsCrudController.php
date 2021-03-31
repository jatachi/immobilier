<?php

namespace App\Controller\Admin;

use App\Entity\Attachements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AttachementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attachements::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('property'),
            TextField::new('image')
        ];
    }
    
}
