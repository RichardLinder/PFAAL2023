<?php

namespace App\Controller\Admin;

use App\Entity\Forme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FormeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Forme::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
