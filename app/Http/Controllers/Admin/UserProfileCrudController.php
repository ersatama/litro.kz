<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserProfileRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserProfileCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserProfileCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\UserProfile::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-profile');
        CRUD::setEntityNameStrings('user profile', 'user profiles');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('user_id');
        CRUD::column('parent_id');
        CRUD::column('image_id');
        CRUD::column('first_name');
        CRUD::column('middle_name');
        CRUD::column('last_name');
        CRUD::column('locale');
        CRUD::column('gender');
        CRUD::column('description');
        CRUD::column('discount');
        CRUD::column('bonus');
        CRUD::column('referral_code');
        CRUD::column('balance');
        CRUD::column('rank');

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
