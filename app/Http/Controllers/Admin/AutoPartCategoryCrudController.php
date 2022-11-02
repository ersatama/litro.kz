<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\AutoPartCategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class AutoPartCategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(\App\Models\AutoPartCategory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/auto-part-category');
        CRUD::setEntityNameStrings('auto part category', 'auto part categories');
    }

    protected function setupListOperation()
    {
        CRUD::column(Contract::POSITION)->label(Contract::T(Contract::ROLE));
        CRUD::column('parent_id');
        CRUD::column('title');
        CRUD::column('title_kz');
        CRUD::column('title_en');
        CRUD::column('description');
        CRUD::column('description_kz');
        CRUD::column('description_en');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AutoPartCategoryRequest::class);

        CRUD::field('position');
        CRUD::field('parent_id');
        CRUD::field('title');
        CRUD::field('title_kz');
        CRUD::field('title_en');
        CRUD::field('description');
        CRUD::field('description_kz');
        CRUD::field('description_en');

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
