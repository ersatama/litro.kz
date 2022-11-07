<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('service', 'services');
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
        CRUD::column('title_kz');
        CRUD::column('title_en');
        CRUD::column('view');
        CRUD::column('view_kz');
        CRUD::column('view_en');
        CRUD::column('description');
        CRUD::column('description_kz');
        CRUD::column('description_en');
        CRUD::column('tagline');
        CRUD::column('tagline_kz');
        CRUD::column('tagline_en');
        CRUD::column('annotation');
        CRUD::column('annotation_kz');
        CRUD::column('annotation_en');
        CRUD::column('service_type_id');
        CRUD::column('position');
        CRUD::column('is_active');
        CRUD::column('url');
        CRUD::column('price');
        CRUD::column('card_price');
        CRUD::column('selectable');
        CRUD::column('without_card');
        CRUD::column('with_card');
        CRUD::column('note_stars');
        CRUD::column('is_corporate');
        CRUD::column('image_id');
        CRUD::column('browser_image_id');
        CRUD::column('additional_image_id');

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
        CRUD::setValidation(ServiceRequest::class);

        CRUD::field('title');
        CRUD::field('title_kz');
        CRUD::field('title_en');
        CRUD::field('view');
        CRUD::field('view_kz');
        CRUD::field('view_en');
        CRUD::field('description');
        CRUD::field('description_kz');
        CRUD::field('description_en');
        CRUD::field('tagline');
        CRUD::field('tagline_kz');
        CRUD::field('tagline_en');
        CRUD::field('annotation');
        CRUD::field('annotation_kz');
        CRUD::field('annotation_en');
        CRUD::field('service_type_id');
        CRUD::field('position');
        CRUD::field('is_active');
        CRUD::field('url');
        CRUD::field('price');
        CRUD::field('card_price');
        CRUD::field('selectable');
        CRUD::field('without_card');
        CRUD::field('with_card');
        CRUD::field('note_stars');
        CRUD::field('is_corporate');
        CRUD::field('image_id');
        CRUD::field('browser_image_id');
        CRUD::field('additional_image_id');

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
