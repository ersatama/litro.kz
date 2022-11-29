<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\DriverRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class DriverCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Driver::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/driver');
        CRUD::setEntityNameStrings('Водитель', 'Водители');
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    protected function extracted(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID));
        CRUD::column(Contract::FIRST_NAME)->label(Contract::T(Contract::FIRST_NAME));
        CRUD::column(Contract::LAST_NAME)->label(Contract::T(Contract::LAST_NAME));
        CRUD::column(Contract::PATRONYMIC)->label(Contract::T(Contract::PATRONYMIC));
        CRUD::column(Contract::REFERRAL_CODE)->label(Contract::T(Contract::REFERRAL_CODE));
        CRUD::column(Contract::ORDER_CARD_ID)->label(Contract::T(Contract::ORDER_CARD_ID));
        CRUD::column(Contract::PHONE)->label(Contract::T(Contract::PHONE));
    }

    protected function setupShowOperation()
    {
        $this->extracted();
    }

    protected function setupListOperation()
    {
        $this->extracted();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(DriverRequest::class);

        CRUD::field('first_name');
        CRUD::field('last_name');
        CRUD::field('patronymic');
        CRUD::field('referral_code');
        CRUD::field('order_card_id');
        CRUD::field('phone');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
