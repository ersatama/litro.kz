<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\UserCarRequest;
use App\Models\UserCar;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(UserCar::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-car');
        CRUD::setEntityNameStrings(Contract::T(Contract::USER_CAR), Contract::T(Contract::USER_CARS));
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('user_id');
        CRUD::column('car_brand_id');
        CRUD::column('car_model_id');
        CRUD::column('year');
        CRUD::column('registration_certificate');
        CRUD::column('car_number');
        CRUD::column('vin');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserCarRequest::class);

        CRUD::field('user_id');
        CRUD::field('car_brand_id');
        CRUD::field('car_model_id');
        CRUD::field('year');
        CRUD::field('registration_certificate');
        CRUD::field('car_number');
        CRUD::field('vin');

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
