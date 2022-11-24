<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup(): void
    {
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings(Contract::T(Contract::USER), Contract::T(Contract::USERS));

        if (!in_array(backpack_user()->{Contract::ROLE_ID},[2,4])) {
            CRUD::denyAccess('delete');
        }
        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::ID,
            Contract::LABEL =>  'ID',
        ],
            false,
            function($value) {
                $this->crud->addClause('where', 'id', 'like', "$value%");
            });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::FIRST_NAME,
            Contract::LABEL =>  Contract::T(Contract::FIRST_NAME)
        ],
            false,
            function($value) {
                $this->crud->addClause('where', Contract::FIRST_NAME, 'like', "$value%");
            });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::LAST_NAME,
            Contract::LABEL =>  Contract::T(Contract::LAST_NAME)
        ],
            false,
            function($value) {
                $this->crud->addClause('where', Contract::LAST_NAME, 'like', "$value%");
            });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::PATRONYMIC,
            Contract::LABEL =>  Contract::T(Contract::PATRONYMIC)
        ],
            false,
            function($value) {
                $this->crud->addClause('where', Contract::PATRONYMIC, 'like', "$value%");
            });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::DATE_RANGE,
            Contract::NAME  =>  Contract::BIRTHDATE,
            Contract::LABEL =>  Contract::T(Contract::BIRTHDATE)
        ],
            false,
            function ($value) {
                $dates  =   json_decode($value);
                $this->crud->addClause('whereDate', Contract::BIRTHDATE, '>=', $dates->from);
                $this->crud->addClause('whereDate', Contract::BIRTHDATE, '<=', $dates->to);
            });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::DROPDOWN,
            Contract::NAME  =>  Contract::GENDER,
            Contract::LABEL =>  Contract::T(Contract::GENDER)
        ], [
            Contract::MALE      =>  Contract::T(Contract::MALE),
            Contract::FEMALE    =>  Contract::T(Contract::FEMALE),
        ], function($value) {
            $this->crud->addClause('where', Contract::GENDER, 'like', "$value%");
        });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::SELECT2,
            Contract::NAME  =>  Contract::CITY_ID,
            Contract::LABEL =>  Contract::T(Contract::CITY)
        ], function () {
            $cities =   City::whereNotNull(Contract::TITLE)->get();
            $arr    =   [];
            foreach ($cities as &$value) {
                $arr[$value->{Contract::ID}]    =   $value->{Contract::TITLE};
            }
            return $arr;
        }, function ($value) {
            $this->crud->addClause('where', Contract::CITY_ID, $value);
        });

        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::PHONE,
            Contract::LABEL =>  Contract::T(Contract::PHONE)
        ],
            false,
            function($value) {
                $this->crud->addClause('where', Contract::PHONE, 'like', "$value%");
            });
        $this->crud->addFilter([
            Contract::TYPE  =>  Contract::TEXT,
            Contract::NAME  =>  Contract::EMAIL,
            Contract::LABEL =>  Contract::T(Contract::EMAIL)
        ],
            false,
            function($value) {
                $this->crud->addClause('where', Contract::EMAIL, 'like', "$value%");
            });
    }

    protected function setupShowOperation(): void
    {
        $this->extracted();
        CRUD::column(Contract::ROLE_ID)
            ->label(Contract::T(Contract::ROLE))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                1   =>  Contract::T(Contract::USER),
                2   =>  Contract::T(Contract::ADMIN),
                3   =>  Contract::T(Contract::MANAGER),
                4   =>  Contract::T(Contract::SUPER_ADMIN),
            ]);
        CRUD::column(Contract::BITRIX_ID)->label(Contract::T(Contract::BITRIX));
        CRUD::column(Contract::PHONE)->label(Contract::T(Contract::PHONE));
        CRUD::column(Contract::EMAIL)->label(Contract::T(Contract::EMAIL));
        CRUD::column(Contract::IIN)->label(Contract::T(Contract::IIN))->type(Contract::NUMBER);
        CRUD::column(Contract::IS_BLOCKED)->label(Contract::T(Contract::IS_BLOCKED));
    }

    protected function setupListOperation(): void
    {

        $this->extracted();
        CRUD::column(Contract::IS_VLIFE_USER)->label(Contract::T(Contract::IS_VLIFE_USER))->type(Contract::SELECT_FROM_ARRAY)->options([
            TRUE    =>  Contract::T(Contract::YES),
            FALSE   =>  Contract::T(Contract::NO),
        ]);
        CRUD::column(Contract::VLIFE_USER_ID)->label(Contract::T(Contract::VLIFE_USER_ID));
        CRUD::column(Contract::PROMO_CODE)->label(Contract::T(Contract::PROMO_CODE));
        CRUD::column(Contract::BONUS)->label(Contract::T(Contract::BONUS));
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::field(Contract::ROLE_ID)
            ->label(Contract::T(Contract::ROLE))
            ->default(1);

        CRUD::field(Contract::CITY_ID)
            ->label(Contract::T(Contract::CITY));

        CRUD::field(Contract::PHONE)
            ->label(Contract::T(Contract::PHONE));

        CRUD::field(Contract::EMAIL)
            ->label(Contract::T(Contract::EMAIL));

        CRUD::field(Contract::IIN)
            ->label(Contract::T(Contract::IIN))
            ->type(Contract::NUMBER);

        CRUD::field(Contract::FIRST_NAME)
            ->label(Contract::T(Contract::FIRST_NAME));

        CRUD::field(Contract::LAST_NAME)
            ->label(Contract::T(Contract::LAST_NAME));

        CRUD::field(Contract::PATRONYMIC)
            ->label(Contract::T(Contract::PATRONYMIC));

        CRUD::field(Contract::BIRTHDATE)
            ->label(Contract::T(Contract::BIRTHDATE))
            ->type(Contract::DATE);

        CRUD::field(Contract::PASSWORD)
            ->label(Contract::T(Contract::PASSWORD));

        CRUD::field(Contract::IS_BLOCKED)
            ->label(Contract::T(Contract::IS_BLOCKED))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                true    =>  Contract::T(Contract::YES),
                false   =>  Contract::T(Contract::NO),
            ])
            ->default(false);

        CRUD::field(Contract::GENDER)
            ->label(Contract::T(Contract::GENDER))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                Contract::MALE      =>  Contract::T(Contract::MALE),
                Contract::FEMALE    =>  Contract::T(Contract::FEMALE),
            ])
            ->default(Contract::MALE);

        CRUD::field(Contract::IS_VLIFE_USER)
            ->label(Contract::T(Contract::IS_VLIFE_USER))
            ->type(Contract::SELECT_FROM_ARRAY)
            ->options([
                true    =>  Contract::T(Contract::YES),
                false   =>  Contract::T(Contract::NO),
            ])->default(false);

        CRUD::field(Contract::VLIFE_USER_ID)
            ->label(Contract::T(Contract::VLIFE_USER_ID));

        CRUD::field(Contract::PROMO_CODE)
            ->label(Contract::T(Contract::PROMO_CODE));

        CRUD::field(Contract::BONUS)
            ->label(Contract::T(Contract::BONUS));
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    /**
     * @return void
     */
    protected function extracted(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::FIRST_NAME)->label(Contract::T(Contract::FIRST_NAME));
        CRUD::column(Contract::LAST_NAME)->label(Contract::T(Contract::LAST_NAME));
        CRUD::column(Contract::PATRONYMIC)->label(Contract::T(Contract::PATRONYMIC));
        CRUD::column(Contract::BIRTHDATE)->label(Contract::T(Contract::BIRTHDATE))->type(Contract::DATE);
        CRUD::column(Contract::GENDER)->label(Contract::T(Contract::GENDER))->type(Contract::SELECT_FROM_ARRAY)->options([
            Contract::MALE  =>  Contract::T(Contract::MALE),
            Contract::FEMALE    =>  Contract::T(Contract::FEMALE),
        ]);
        CRUD::column(Contract::CITY_ID)->label(Contract::T(Contract::CITY));
        CRUD::column(Contract::PHONE)->label(Contract::T(Contract::PHONE));
        CRUD::column(Contract::EMAIL)->label(Contract::T(Contract::EMAIL));
    }
}
