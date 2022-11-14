<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserProfileCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(UserProfile::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-profile');
        CRUD::setEntityNameStrings(Contract::T(Contract::USER_PROFILE), Contract::T(Contract::USER_PROFILES));
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
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::USER)->type(Contract::SELECT)->label(Contract::T(Contract::USER))
            ->entity(Contract::IMAGE)
            ->model(User::class)
            ->attribute(Contract::EMAIL);
        CRUD::column(Contract::FIRST_NAME)->label(Contract::T(Contract::FIRST_NAME));
        CRUD::column(Contract::MIDDLE_NAME)->label(Contract::T(Contract::MIDDLE_NAME));
        CRUD::column(Contract::LAST_NAME)->label(Contract::T(Contract::LAST_NAME));
        CRUD::column(Contract::GENDER)->label(Contract::T(Contract::GENDER))->type(Contract::SELECT_FROM_ARRAY)->options([
            Contract::MALE  =>  Contract::T(Contract::MALE),
            Contract::FEMALE    =>  Contract::T(Contract::FEMALE),
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserProfileRequest::class);

        CRUD::field('user_id');
        CRUD::field('parent_id');
        CRUD::field('image_id');
        CRUD::field('first_name');
        CRUD::field('middle_name');
        CRUD::field('last_name');
        CRUD::field('locale');
        CRUD::field('gender');
        CRUD::field('description');
        CRUD::field('discount');
        CRUD::field('bonus');
        CRUD::field('referral_code');
        CRUD::field('balance');
        CRUD::field('rank');

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
