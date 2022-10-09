<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('role_id');
        CRUD::column('city_id');
        CRUD::column('bitrix_id');
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('iin');
        CRUD::column('first_name');
        CRUD::column('last_name');
        CRUD::column('patronymic');
        CRUD::column('birthdate');
        CRUD::column('password');
        CRUD::column('is_blocked');
        CRUD::column('gender');
        CRUD::column('is_vlife_user');
        CRUD::column('vlife_user_id');
        CRUD::column('promo_code');
        CRUD::column('bonus');

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
        CRUD::setValidation(UserRequest::class);

        CRUD::field('role_id');
        CRUD::field('city_id');
        CRUD::field('bitrix_id');
        CRUD::field('phone');
        CRUD::field('email');
        CRUD::field('iin');
        CRUD::field('first_name');
        CRUD::field('last_name');
        CRUD::field('patronymic');
        CRUD::field('birthdate');
        CRUD::field('password');
        CRUD::field('is_blocked');
        CRUD::field('gender');
        CRUD::field('is_vlife_user');
        CRUD::field('vlife_user_id');
        CRUD::field('promo_code');
        CRUD::field('bonus');

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
