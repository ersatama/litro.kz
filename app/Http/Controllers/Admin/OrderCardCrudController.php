<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\OrderCardRequest;
use App\Models\Card;
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
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'id',
            'label' => 'ID'
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'id', 'like', "$value%");
            });
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'price',
            'label' => 'цена'
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'price', 'like', "$value%");
            });
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'user_id',
            'label' => 'ID пользователя'
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'user_id', 'like', "$value%");
            });
        $this->crud->addFilter([
            'name'  => 'is_from_excel',
            'type'  => 'dropdown',
            'label' => 'Из экселя'
        ], ['Нет','Да'], function($value) { // if the filter is active
            $this->crud->addClause('where', 'is_from_excel', $value);
        });
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'number',
            'label' => 'Номер'
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'number', 'like', "$value%");
            });
        $this->crud->addFilter([
            'name'  => 'card_id',
            'type'  => 'select2',
            'label' => 'Карта'
        ], function () {
            $cards  =   Card::whereNotNull(Contract::TITLE)->get();
            $arr    =   [];
            foreach ($cards as &$value) {
                $arr[$value->{Contract::ID}]    =   $value->{Contract::TITLE};
            }
            return $arr;
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'card_id', $value);
        });
        $this->crud->addFilter([
            'type'  => 'date_range',
            'name'  => 'from_to',
            'label' => 'Дата начало'
        ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates  =   json_decode($value);
                $this->crud->addClause('whereDate', 'start_date', '>=', $dates->from);
                $this->crud->addClause('whereDate', 'start_date', '<=', $dates->to);
            });
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'payment_type',
            'label' => 'Тип платежа'
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'payment_type', 'like', "$value%");
            });
        $this->crud->addFilter([
            'name'  => 'is_paid',
            'type'  => 'dropdown',
            'label' => 'Оплачено'
        ], ['Нет','Да'], function($value) { // if the filter is active
            $this->crud->addClause('where', 'is_paid', $value);
        });
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'paybox_order_id',
            'label' => 'Paybox ID'
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'paybox_order_id', 'like', "$value%");
            });
        $this->crud->addFilter([
            'name'  => 'status',
            'type'  => 'select2',
            'label' => 'Статус'
        ], function () {
            $cards  =   OrderCard::select(Contract::STATUS)->groupBy(Contract::STATUS)->get();
            $arr    =   [];
            foreach ($cards as &$value) {
                $arr[]    =   $value->{Contract::STATUS};
            }
            return $arr;
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'status', 'like', "$value%");
        });
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'utm_campaign',
            'label' => 'UTM campaign'
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'utm_campaign', 'like', "$value%");
            });
    }

    protected function setupShowOperation()
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::CARD_ID)->label(Contract::T(Contract::CARD));
        CRUD::column(Contract::USER_ID)->label(Contract::T(Contract::USER));
        CRUD::column(Contract::BITRIX_ID)->label('Bitrix ID');
        CRUD::column('synced');
        CRUD::column(Contract::PRICE)->label(Contract::T(Contract::PRICE));
        CRUD::column(Contract::START_DATE)->label(Contract::T(Contract::START_DATE))->type(Contract::DATE);
        CRUD::column(Contract::END_DATE)->label(Contract::T(Contract::END_DATE))->type(Contract::DATE);
        CRUD::column(Contract::NUMBER)->label(Contract::T(Contract::NUMBER));
        CRUD::column(Contract::PAYMENT_TYPE)->label(Contract::T(Contract::PAYMENT_TYPE));
        CRUD::column(Contract::PAYBOX_ORDER_ID)->label('Paybox ID');
        CRUD::column(Contract::PAYBOX_ORDER_DATE)->label('Paybox Дата');
        CRUD::column(Contract::STATUS)->label(Contract::T(Contract::STATUS));
        CRUD::column(Contract::REFERRAL)->label('Реферал');
        CRUD::column(Contract::RECURRENT_ENABLED);
        CRUD::column(Contract::IS_PAID)->label(Contract::T(Contract::IS_PAID))->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ]);
        CRUD::column('is_canceled');
        CRUD::column('monthly');
        CRUD::column(Contract::IS_FROM_EXCEL)->label(Contract::T(Contract::IS_FROM_EXCEL))->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ]);
        CRUD::column(Contract::ACTIVATE_DATE)->label('Дата активации');
        CRUD::column(Contract::PAYMENT_METHOD)->label('Метод платежа');
        CRUD::column('utm_campaign');
        CRUD::column('import_id');
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
        CRUD::field('recurrent_enabled')->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ])->default(0);
        CRUD::field('is_paid')->label('Оплачено')->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ])->default(0);
        CRUD::field('is_canceled')->label('Отменен')->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ])->default(0);
        CRUD::field('monthly')->label('Помесячно')->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ])->default(0);
        CRUD::field('is_from_excel')->label('Из экселя')->type(Contract::SELECT_FROM_ARRAY)->options([
            1   =>  Contract::T(Contract::YES),
            0   =>  Contract::T(Contract::NO),
        ])->default(0);
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
