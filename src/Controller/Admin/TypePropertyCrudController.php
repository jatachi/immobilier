<?php

namespace App\Controller\Admin;

use App\Entity\TypeProperty;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypePropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeProperty::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            ImageField::new('illustration')->setBasePath('uploads/')->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->setRequired(false),
            TextareaField::new('description')->hideOnIndex(),
        ];
    }
    
}
