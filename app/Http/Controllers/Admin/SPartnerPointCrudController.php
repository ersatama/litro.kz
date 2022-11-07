<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SPartnerPointRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SPartnerPointCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SPartnerPointCrudController extends CrudController
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
        CRUD::setModel(\App\Models\SPartnerPoint::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/s-partner-point');
        CRUD::setEntityNameStrings('s partner point', 's partner points');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('legal_title');
        CRUD::column('description');
        CRUD::column('manager_name');
        CRUD::column('address');
        CRUD::column('city_id');
        CRUD::column('lat');
        CRUD::column('long');
        CRUD::column('info');
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('password');
        CRUD::column('bonus_percent');
        CRUD::column('discount');
        CRUD::column('sell_card');
        CRUD::column('ads_and_sell');
        CRUD::column('image_id');

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
        CRUD::setValidation(SPartnerPointRequest::class);

        CRUD::field('title');
        CRUD::field('legal_title');
        CRUD::field('description');
        CRUD::field('manager_name');
        CRUD::field('address');
        CRUD::field('city_id');
        CRUD::field('lat');
        CRUD::field('long');
        CRUD::field('info');
        CRUD::field('phone');
        CRUD::field('email');
        CRUD::field('password');
        CRUD::field('bonus_percent');
        CRUD::field('discount');
        CRUD::field('sell_card');
        CRUD::field('ads_and_sell');
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
