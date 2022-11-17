<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\OrderCardRequest;
use App\Models\OrderCard;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OrderCardCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(OrderCard::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order-card');
        CRUD::setEntityNameStrings('Карта', 'Заказные карты');
        $this->crud->setListView('vendor.backpack.crud.orderCard.list');
    }

    protected function setupListOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::PRICE)->label(Contract::T(Contract::PRICE));
        CRUD::column(Contract::USER)->type(Contract::SELECT)->label(Contract::T(Contract::USER))
            ->entity(Contract::USER)
            ->model(User::class)
            ->attribute(Contract::ID);
        CRUD::column(Contract::CARD_ID)->label(Contract::T(Contract::CARD));
        CRUD::column(Contract::IS_FROM_EXCEL)->label(Contract::T(Contract::IS_FROM_EXCEL))->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ]);
        CRUD::column(Contract::NUMBER)->label(Contract::T(Contract::NUMBER));
        CRUD::column(Contract::START_DATE)->label(Contract::T(Contract::START_DATE))->type(Contract::DATE);
        CRUD::column(Contract::PAYMENT_TYPE)->label(Contract::T(Contract::PAYMENT_TYPE));
        CRUD::column(Contract::IS_PAID)->label(Contract::T(Contract::IS_PAID))->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ]);
        CRUD::column(Contract::PAYBOX_ORDER_ID)->label(Contract::T(Contract::PAYBOX_ORDER_ID));
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
