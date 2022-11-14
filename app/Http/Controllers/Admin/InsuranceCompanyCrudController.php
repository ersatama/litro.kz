<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\InsuranceCompanyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InsuranceCompanyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InsuranceCompanyCrudController extends CrudController
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
        CRUD::setModel(\App\Models\InsuranceCompany::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/insurance-company');
        CRUD::setEntityNameStrings('insurance company', 'insurance companies');
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
    protected function setupListOperation()
    {
        CRUD::column('image_id');
        CRUD::column('name');
        CRUD::column('name_kz');
        CRUD::column('name_en');
        CRUD::column('filter_name');
        CRUD::column('description');
        CRUD::column('description_kz');
        CRUD::column('description_en');
        CRUD::column('opgo_link');
        CRUD::column('site');
        CRUD::column('bonus_percent');
        CRUD::column('provides_required_insurance');
        CRUD::column('provides_additional_insurance');
        CRUD::column('required_insurance_bonus');
        CRUD::column('additional_insurance_bonus');
        CRUD::column('kasko_link');
        CRUD::column('api_token');

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
        CRUD::setValidation(InsuranceCompanyRequest::class);

        CRUD::field('image_id');
        CRUD::field('name');
        CRUD::field('name_kz');
        CRUD::field('name_en');
        CRUD::field('filter_name');
        CRUD::field('description');
        CRUD::field('description_kz');
        CRUD::field('description_en');
        CRUD::field('opgo_link');
        CRUD::field('site');
        CRUD::field('bonus_percent');
        CRUD::field('provides_required_insurance');
        CRUD::field('provides_additional_insurance');
        CRUD::field('required_insurance_bonus');
        CRUD::field('additional_insurance_bonus');
        CRUD::field('kasko_link');
        CRUD::field('api_token');

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
