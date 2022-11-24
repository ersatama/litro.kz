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
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::ID,
            Contract::LABEL =>  'ID',
        ],
            false,
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'id', 'like', "$value%");
            });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::PRICE,
            Contract::LABEL =>  Contract::T(Contract::PRICE)
            ],
            false,
            function($value) {
                $this->crud->addClause('where', Contract::PRICE, 'like', "$value%");
            });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::USER_ID,
            Contract::LABEL =>  'ID пользователя'
        ],
            false,
            function($value) {
                $this->crud->addClause('where', Contract::USER_ID, 'like', "$value%");
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
            'type'  => Contract::DATE_RANGE,
            'name'  => Contract::START_DATE,
            'label' => Contract::T(Contract::START_DATE)
        ],
            false,
            function ($value) {
                $dates  =   json_decode($value);
                $this->crud->addClause('whereDate', Contract::START_DATE, '>=', $dates->from);
                $this->crud->addClause('whereDate', Contract::START_DATE, '<=', $dates->to);
            });

        $this->crud->addFilter([
            'type'  => Contract::DATE_RANGE,
            'name'  => Contract::END_DATE,
            'label' => Contract::T(Contract::END_DATE)
        ],
            false,
            function ($value) {
                $dates  =   json_decode($value);
                $this->crud->addClause('whereDate', Contract::END_DATE, '>=', $dates->from);
                $this->crud->addClause('whereDate', Contract::END_DATE, '<=', $dates->to);
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

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(OrderCardRequest::class);

        CRUD::field(Contract::CARD_ID)
            ->label(Contract::T(Contract::CARD));

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

        CRUD::field(Contract::SYNCED);

        CRUD::field(Contract::PRICE)
            ->label(Contract::T(Contract::PRICE));

        CRUD::field(Contract::START_DATE)
            ->label(Contract::T(Contract::START_DATE))
            ->type(Contract::DATE);

        CRUD::field(Contract::END_DATE)
            ->label(Contract::T(Contract::END_DATE))
            ->type(Contract::DATE);

        CRUD::field(Contract::NUMBER)
            ->label(Contract::T(Contract::NUMBER));

        $this->crud->addField([
            Contract::NAME  =>  Contract::PAYMENT_TYPE,
            Contract::LABEL =>  Contract::T(Contract::PAYMENT_TYPE),
            Contract::TYPE  =>  Contract::SELECT_FROM_ARRAY,
            Contract::OPTIONS   =>  ['cash','paybox','pay_box'],
            Contract::ALLOWS_NULL   =>  true,
        ]);

        CRUD::field(Contract::PAYBOX_ORDER_ID)
            ->label(Contract::T(Contract::PAYBOX_ORDER_ID));

        CRUD::field(Contract::PAYBOX_ORDER_DATE)
            ->label(Contract::T(Contract::PAYBOX_ORDER_DATE))
            ->type(Contract::DATE);

        $this->crud->addField([
            Contract::NAME  =>  Contract::STATUS,
            Contract::LABEL =>  Contract::T(Contract::STATUS),
            Contract::TYPE  =>  Contract::SELECT_FROM_ARRAY,
            Contract::OPTIONS   =>  ['Активна','Оплачено','Не оплачено','Отменена','Не оплачен'],
            Contract::ALLOWS_NULL   =>  true,
            Contract::DEFAULT   =>  0
        ]);

        CRUD::field(Contract::REFERRAL)
            ->label(Contract::T(Contract::REFERRAL));

        CRUD::field(Contract::RECURRENT_ENABLED)
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ])
            ->default(0);

        CRUD::field(Contract::IS_PAID)
            ->label(Contract::T(Contract::IS_PAID))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ])
            ->default(0);

        CRUD::field(Contract::IS_CANCELED)
            ->label(Contract::T(Contract::IS_CANCELED))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ])
            ->default(0);

        CRUD::field(Contract::MONTHLY)
            ->label(Contract::T(Contract::MONTHLY))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ])
            ->default(0);

        CRUD::field(Contract::IS_FROM_EXCEL)
            ->label(Contract::T(Contract::IS_FROM_EXCEL))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::T(Contract::NO),
                Contract::T(Contract::YES),
            ])
            ->default(0);

        CRUD::field(Contract::ACTIVATE_DATE)
            ->label(Contract::T(Contract::ACTIVATE_DATE))
            ->type(Contract::DATE);

        $this->crud->addField([
            Contract::NAME  =>  Contract::PAYMENT_METHOD,
            Contract::LABEL =>  Contract::T(Contract::PAYMENT_METHOD),
            Contract::TYPE  =>  Contract::SELECT_FROM_ARRAY,
            Contract::OPTIONS   =>  ['mobile_commerce','bankcard'],
            Contract::ALLOWS_NULL   =>  true,
        ]);

        CRUD::field(Contract::UTM_CAMPAIGN)
            ->label(Contract::T(Contract::UTM_CAMPAIGN));
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
