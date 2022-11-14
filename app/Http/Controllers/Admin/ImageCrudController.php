<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ImageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ImageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(Image::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/image');
        CRUD::setEntityNameStrings(Contract::T(Contract::IMAGE), Contract::T(Contract::IMAGES));
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    protected function setupShowOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::USER_ID)->label(Contract::T(Contract::USER));
        CRUD::column(Contract::PNG)->type(Contract::IMAGE);
        CRUD::column(Contract::WEBP)->type(Contract::IMAGE);
        CRUD::column(Contract::JPG)->type(Contract::IMAGE);
    }

    protected function setupListOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::USER_ID)->label(Contract::T(Contract::USER));
        CRUD::column(Contract::PNG)->type(Contract::IMAGE);
        CRUD::column(Contract::WEBP)->type(Contract::IMAGE);
        CRUD::column(Contract::JPG)->type(Contract::IMAGE);
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ImageRequest::class);

        CRUD::field('user_id');
        CRUD::field('png');
        CRUD::field('webp');
        CRUD::field('jpg');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
