<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderCardRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCardCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCardCrudController extends CrudController
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
        CRUD::setModel(\App\Models\OrderCard::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order-card');
        CRUD::setEntityNameStrings('order card', 'order cards');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('card_id');
        CRUD::column('user_id');
        CRUD::column('bitrix_id');
        CRUD::column('synced');
        CRUD::column('price');
        CRUD::column('start_date');
        CRUD::column('end_date');
        CRUD::column('number');
        CRUD::column('payment_type');
        CRUD::column('paybox_order_id');
        CRUD::column('paybox_order_date');
        CRUD::column('status');
        CRUD::column('referral');
        CRUD::column('recurrent_enabled');
        CRUD::column('is_paid');
        CRUD::column('is_canceled');
        CRUD::column('monthly');
        CRUD::column('is_from_excel');
        CRUD::column('activate_date');
        CRUD::column('payment_method');
        CRUD::column('utm_campaign');
        CRUD::column('import_id');

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
        CRUD::setValidation(OrderCardRequest::class);

        CRUD::field('card_id');
        CRUD::field('user_id');
        CRUD::field('bitrix_id');
        CRUD::field('synced');
        CRUD::field('price');
        CRUD::field('start_date');
        CRUD::field('end_date');
        CRUD::field('number');
        CRUD::field('payment_type');
        CRUD::field('paybox_order_id');
        CRUD::field('paybox_order_date');
        CRUD::field('status');
        CRUD::field('referral');
        CRUD::field('recurrent_enabled');
        CRUD::field('is_paid');
        CRUD::field('is_canceled');
        CRUD::field('monthly');
        CRUD::field('is_from_excel');
        CRUD::field('activate_date');
        CRUD::field('payment_method');
        CRUD::field('utm_campaign');
        CRUD::field('import_id');

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
