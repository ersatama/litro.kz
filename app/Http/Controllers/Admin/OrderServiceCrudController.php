<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\OrderServiceRequest;
use App\Models\OrderService;
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
    public function setup(): void
    {
        CRUD::setModel(OrderService::class);
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
        CRUD::column(Contract::USER_ID)->label(Contract::T(Contract::USER));
        CRUD::column(Contract::ORDER_CARD_ID)->label(Contract::T(Contract::ORDER_CARD_ID));
        CRUD::column(Contract::BITRIX_ID)->label(Contract::T(Contract::BITRIX_ID));
        CRUD::column(Contract::PLACE_ID)->label(Contract::T(Contract::PLACE));
        CRUD::column(Contract::CITY_ID)->label(Contract::T(Contract::CITY));
        CRUD::column(Contract::CAR_CATEGORY_ID)->label(Contract::T(Contract::CAR_CATEGORY));
        CRUD::column(Contract::PAYBOX_ORDER_ID)->label(Contract::T(Contract::PAYBOX_ORDER_ID));
        CRUD::column(Contract::PAYBOX_ORDER_DATE)->label(Contract::T(Contract::PAYBOX_ORDER_DATE));
        CRUD::column(Contract::PRICE)->label(Contract::T(Contract::PRICE));
        CRUD::column(Contract::OLD_PRICE)->label(Contract::T(Contract::OLD_PRICE));
        CRUD::column(Contract::PAYMENT_TYPE)->label(Contract::T(Contract::PAYMENT_TYPE));
        CRUD::column(Contract::PAYMENT_METHOD)->label(Contract::T(Contract::PAYMENT_METHOD));
        CRUD::column(Contract::ADDRESS)->label(Contract::T(Contract::ADDRESS));
        CRUD::column(Contract::LAT)->label(Contract::T(Contract::LAT));
        CRUD::column(Contract::LONG)->label(Contract::T(Contract::LONG));
        CRUD::column(Contract::REVIEW)->label(Contract::T(Contract::REVIEW));
        CRUD::column(Contract::RANK)->label(Contract::T(Contract::RANK));
        CRUD::column(Contract::NAME)->label(Contract::T(Contract::NAME));
        CRUD::column(Contract::PHONE)->label(Contract::T(Contract::PHONE));
        CRUD::column(Contract::STATUS)->label(Contract::T(Contract::STATUS));
        CRUD::column(Contract::IS_PAID)->label(Contract::T(Contract::IS_PAID));
        CRUD::column(Contract::IS_CARD)->label(Contract::T(Contract::IS_CARD));
        CRUD::column(Contract::IS_CANCELED)->label(Contract::T(Contract::IS_CANCELED));
        CRUD::column(Contract::UTM_CAMPAIGN)->label(Contract::T(Contract::UTM_CAMPAIGN));
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

        CRUD::field(Contract::MASTER_ID)->label(Contract::T(Contract::MASTER_ID));

        $this->crud->addField([
            Contract::NAME  =>  Contract::USER_ID,
            Contract::LABEL =>  Contract::T(Contract::USER),
            Contract::TYPE  =>  Contract::SELECT2_FROM_ARRAY,
            Contract::ENTITY    =>  Contract::USER,
            Contract::PLACEHOLDER   => 'ID или Ф.И.О пользователя',
            Contract::MINIMUM_INPUT_LENGTH  =>  '',
            Contract::ATTRIBUTE =>  Contract::FULL,
            Contract::DATA_SOURCE   =>  url('api/user/search')
        ]);

        CRUD::field(Contract::ORDER_CARD_ID)
            ->label(Contract::T(Contract::ORDER_CARD_ID))
            ->type(Contract::NUMBER);

        CRUD::field(Contract::PLACE_ID)
            ->label(Contract::T(Contract::PLACE));

        CRUD::field(Contract::CITY_ID)
            ->label(Contract::T(Contract::CITY));

        CRUD::field(Contract::CAR_CATEGORY_ID)
            ->label(Contract::T(Contract::CAR_CATEGORY));

        CRUD::field(Contract::PRICE)
            ->label(Contract::T(Contract::PRICE))
            ->type(Contract::NUMBER);

        CRUD::field(Contract::OLD_PRICE)
            ->label(Contract::T(Contract::OLD_PRICE));

        $this->crud->addField([
            Contract::NAME  =>  Contract::PAYMENT_TYPE,
            Contract::LABEL =>  Contract::T(Contract::PAYMENT_TYPE),
            Contract::TYPE  =>  Contract::SELECT_FROM_ARRAY,
            Contract::OPTIONS   =>  ['cash','paybox','pay_box'],
            Contract::ALLOWS_NULL   =>  true,
        ]);

        $this->crud->addField([
            Contract::NAME  =>  Contract::PAYMENT_METHOD,
            Contract::LABEL =>  Contract::T(Contract::PAYMENT_METHOD),
            Contract::TYPE  =>  Contract::SELECT_FROM_ARRAY,
            Contract::OPTIONS   =>  ['mobile_commerce','bankcard'],
            Contract::ALLOWS_NULL   =>  true,
        ]);

        CRUD::field(Contract::ADDRESS)
            ->label(Contract::T(Contract::ADDRESS));

        CRUD::field(Contract::LAT)
            ->label(Contract::T(Contract::LAT));

        CRUD::field(Contract::LONG)
            ->label(Contract::T(Contract::LONG));

        CRUD::field(Contract::REVIEW)
            ->label(Contract::T(Contract::REVIEW));

        CRUD::field(Contract::RANK)
            ->label(Contract::T(Contract::RANK))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                true    =>  Contract::T(Contract::YES),
                false   =>  Contract::T(Contract::NO),
            ]);

        CRUD::field(Contract::NAME)
            ->label(Contract::T(Contract::NAME));

        CRUD::field(Contract::PHONE)
            ->label(Contract::T(Contract::PHONE));

        CRUD::field(Contract::STATUS)
            ->label(Contract::T(Contract::STATUS))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::FAILED,
                Contract::IN_WORK,
                Contract::DONE,
                Contract::FINISHED,
                Contract::NEW,
                Contract::CANCELED
            ]);

        CRUD::field(Contract::IS_PAID)
            ->label(Contract::T(Contract::IS_PAID))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ]);

        CRUD::field(Contract::IS_CARD)
            ->label(Contract::T(Contract::IS_CARD))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ]);

        CRUD::field(Contract::IS_CANCELED)
            ->label(Contract::T(Contract::IS_CANCELED))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ]);

        CRUD::field(Contract::UTM_CAMPAIGN)
            ->label(Contract::T(Contract::UTM_CAMPAIGN));
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
