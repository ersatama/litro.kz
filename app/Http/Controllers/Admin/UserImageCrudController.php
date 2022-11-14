<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\UserImageRequest;
use App\Models\Image;
use App\Models\User;
use App\Models\UserImage;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserImageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(UserImage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-image');
        CRUD::setEntityNameStrings(Contract::T(Contract::USER_IMAGE), Contract::T(Contract::USER_IMAGES));
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    protected function setupShowOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::USER)->type(Contract::SELECT)->label(Contract::T(Contract::USER))
            ->entity(Contract::IMAGE)
            ->model(User::class)
            ->attribute(Contract::EMAIL);
        CRUD::column(Contract::IMAGE_ID)->type(Contract::SELECT)->label(Contract::T(Contract::IMAGE))
            ->entity(Contract::IMAGE)->model(Image::class)->attribute(Contract::ID);
    }

    protected function setupListOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::USER)->label(Contract::T(Contract::USER));
        CRUD::column(Contract::IMAGE_ID)->type(Contract::SELECT)->label(Contract::T(Contract::IMAGE))
            ->entity(Contract::IMAGE)->model(Image::class)->attribute(Contract::ID);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(UserImageRequest::class);

        CRUD::field('user_id');
        CRUD::field('image_id');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
