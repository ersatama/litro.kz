<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings(Contract::T(Contract::USER), Contract::T(Contract::USERS));
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    protected function setupShowOperation(): void
    {
        $this->extracted();
        CRUD::column(Contract::GENDER)->label(Contract::T(Contract::GENDER));
    }

    protected function setupListOperation(): void
    {
        $this->extracted();
        CRUD::column(Contract::GENDER)->label(Contract::T(Contract::GENDER))->type(Contract::SELECT_FROM_ARRAY)->options([
            Contract::MALE  =>  Contract::T(Contract::MALE),
            Contract::FEMALE    =>  Contract::T(Contract::FEMALE),
        ]);
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

        CRUD::field(Contract::ROLE_ID)->label(Contract::T(Contract::ROLE));
        CRUD::field(Contract::CITY_ID)->label(Contract::T(Contract::CITY));
        CRUD::field(Contract::BITRIX_ID)->label(Contract::T(Contract::BITRIX));
        CRUD::field(Contract::PHONE)->label(Contract::T(Contract::PHONE));
        CRUD::field(Contract::EMAIL)->label(Contract::T(Contract::EMAIL));
        CRUD::field(Contract::IIN)->label(Contract::T(Contract::IIN))->type(Contract::NUMBER);
        CRUD::field(Contract::FIRST_NAME)->label(Contract::T(Contract::FIRST_NAME));
        CRUD::field(Contract::LAST_NAME)->label(Contract::T(Contract::LAST_NAME));
        CRUD::field(Contract::PATRONYMIC)->label(Contract::T(Contract::PATRONYMIC));
        CRUD::field(Contract::BIRTHDATE)->label(Contract::T(Contract::BIRTHDATE))->type(Contract::DATE);
        CRUD::field(Contract::PASSWORD)->label(Contract::T(Contract::PASSWORD));
        CRUD::field(Contract::IS_BLOCKED)->label(Contract::T(Contract::IS_BLOCKED))->type(Contract::SELECT_FROM_ARRAY)->options([
            TRUE    =>  Contract::T(Contract::YES),
            FALSE   =>  Contract::T(Contract::NO),
        ])->default(FALSE);
        CRUD::field(Contract::GENDER)->label(Contract::T(Contract::GENDER))->type(Contract::SELECT_FROM_ARRAY)->options([
            Contract::MALE  =>  Contract::T(Contract::MALE),
            Contract::FEMALE    =>  Contract::T(Contract::FEMALE),
        ])->default(Contract::MALE);
        CRUD::field(Contract::IS_VLIFE_USER)->label(Contract::T(Contract::IS_VLIFE_USER))->type(Contract::SELECT_FROM_ARRAY)->options([
            TRUE    =>  Contract::T(Contract::YES),
            FALSE   =>  Contract::T(Contract::NO),
        ])->default(FALSE);
        CRUD::field(Contract::VLIFE_USER_ID)->label(Contract::T(Contract::VLIFE_USER_ID));
        CRUD::field(Contract::PROMO_CODE)->label(Contract::T(Contract::PROMO_CODE));
        CRUD::field(Contract::BONUS)->label(Contract::T(Contract::BONUS));
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
        CRUD::column(Contract::ROLE_ID)->label(Contract::T(Contract::ROLE));
        CRUD::column(Contract::CITY_ID)->label(Contract::T(Contract::CITY));
        CRUD::column(Contract::BITRIX_ID)->label(Contract::T(Contract::BITRIX));
        CRUD::column(Contract::PHONE)->label(Contract::T(Contract::PHONE));
        CRUD::column(Contract::EMAIL)->label(Contract::T(Contract::EMAIL));
        CRUD::column(Contract::IIN)->label(Contract::T(Contract::IIN))->type(Contract::NUMBER);
        CRUD::column(Contract::FIRST_NAME)->label(Contract::T(Contract::FIRST_NAME));
        CRUD::column(Contract::LAST_NAME)->label(Contract::T(Contract::LAST_NAME));
        CRUD::column(Contract::PATRONYMIC)->label(Contract::T(Contract::PATRONYMIC));
        CRUD::column(Contract::BIRTHDATE)->label(Contract::T(Contract::BIRTHDATE));
        CRUD::column(Contract::IS_BLOCKED)->label(Contract::T(Contract::IS_BLOCKED));
    }
}
