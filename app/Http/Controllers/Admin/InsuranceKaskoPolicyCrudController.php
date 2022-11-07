<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InsuranceKaskoPolicyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InsuranceKaskoPolicyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InsuranceKaskoPolicyCrudController extends CrudController
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
        CRUD::setModel(\App\Models\InsuranceKaskoPolicy::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/insurance-kasko-policy');
        CRUD::setEntityNameStrings('insurance kasko policy', 'insurance kasko policies');
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
        CRUD::column('user_car_id');
        CRUD::column('insurance_company_id');
        CRUD::column('status');
        CRUD::column('price');
        CRUD::column('bonus');
        CRUD::column('error_msg');
        CRUD::column('policy_id');
        CRUD::column('policy_body');
        CRUD::column('products');
        CRUD::column('insurance_price');

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
        CRUD::setValidation(InsuranceKaskoPolicyRequest::class);

        CRUD::field('user_id');
        CRUD::field('user_car_id');
        CRUD::field('insurance_company_id');
        CRUD::field('status');
        CRUD::field('price');
        CRUD::field('bonus');
        CRUD::field('error_msg');
        CRUD::field('policy_id');
        CRUD::field('policy_body');
        CRUD::field('products');
        CRUD::field('insurance_price');

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
