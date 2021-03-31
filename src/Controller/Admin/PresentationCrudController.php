<?php

namespace App\Controller\Admin;

use App\Entity\Presentation;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PresentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Presentation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           ImageField::new('illustration')->setBasePath('uploads/')->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->setRequired(false)
        ];
    }
    
}
