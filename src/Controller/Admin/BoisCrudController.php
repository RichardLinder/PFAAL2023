<?php

namespace App\Controller\Admin;

use App\Entity\Bois;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BoisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bois::class;
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
