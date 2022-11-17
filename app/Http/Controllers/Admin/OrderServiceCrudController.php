<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\OrderServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OrderServiceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\OrderService::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order-service');
        CRUD::setEntityNameStrings('Заказ сервис', 'Заказ сервисы');
        if (!in_array(backpack_user()->{Contract::ROLE_ID},[2,4])) {
            CRUD::denyAccess('delete');
        }
    }

    public function setupShowOperation()
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::MASTER_ID)->label(Contract::T(Contract::MASTER_ID));
        CRUD::column('user_id');
        CRUD::column('order_card_id');
        CRUD::column('bitrix_id');
        CRUD::column('place_id');
        CRUD::column(Contract::CITY_ID)->label(Contract::T(Contract::CITY));
        CRUD::column('car_category_id');
        CRUD::column('paybox_order_id');
        CRUD::column('paybox_order_date');
        CRUD::column('price');
        CRUD::column('old_price');
        CRUD::column('payment_type');
        CRUD::column('payment_method');
        CRUD::column('address');
        CRUD::column('lat');
        CRUD::column('long');
        CRUD::column('review');
        CRUD::column('rank');
        CRUD::column('name');
        CRUD::column('phone');
        CRUD::column('status');
        CRUD::column('is_paid');
        CRUD::column('is_card');
        CRUD::column('is_canceled');
        CRUD::column('utm_campaign');
    }

    protected function setupListOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::CREATED_AT)->label(Contract::T(Contract::CREATED_AT));
        CRUD::column(Contract::ADDRESS)->label(Contract::T(Contract::ADDRESS));
        CRUD::column(Contract::PHONE)->label(Contract::T(Contract::PHONE));
        CRUD::column(Contract::NAME)->label(Contract::T(Contract::NAME));
        CRUD::column(Contract::STATUS)->label(Contract::T(Contract::STATUS));
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(OrderServiceRequest::class);

        CRUD::field('master_id');
        CRUD::field('user_id');
        CRUD::field('order_card_id');
        CRUD::field('bitrix_id');
        CRUD::field('place_id');
        CRUD::field('city_id');
        CRUD::field('car_category_id');
        CRUD::field('paybox_order_id');
        CRUD::field('paybox_order_date');
        CRUD::field('price');
        CRUD::field('old_price');
        CRUD::field('payment_type');
        CRUD::field('payment_method');
        CRUD::field('address');
        CRUD::field('lat');
        CRUD::field('long');
        CRUD::field('review');
        CRUD::field('rank');
        CRUD::field('name');
        CRUD::field('phone');
        CRUD::field('status');
        CRUD::field('is_paid');
        CRUD::field('is_card');
        CRUD::field('is_canceled');
        CRUD::field('utm_campaign');

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
