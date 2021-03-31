<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\AttachementType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class PropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Property::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name')->onlyWhenCreating(),
            ImageField::new('illustration')->setBasePath('uploads/')->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')->setRequired(false),
            MoneyField::new('price')->setCurrency('XOF'),
            TextEditorField::new('description')->onlyWhenCreating(),
            TextareaField::new('situation')->onlyWhenCreating(),
            TextareaField::new('proximite')->onlyWhenCreating(),
            CollectionField::new('attachements','Images')
                ->setEntryType(AttachementType::class)
                ->onlyOnForms(),
            CollectionField::new('attachements','Images')
                ->setTemplatePath('images.html.twig')
                ->onlyOnDetail(),
            BooleanField::new('isbest'),
            BooleanField::new('isavaible'),
            AssociationField::new('typeproperty')
            
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX,'detail');
    }
    
}
