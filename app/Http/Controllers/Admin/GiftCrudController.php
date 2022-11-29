<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class GiftCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Gift::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/gift');
        CRUD::setEntityNameStrings('Подарочная карта', 'Подарочные карты');
        $this->crud->enableDetailsRow();
        $this->crud->enableExportButtons();
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    protected function setupShowOperation(): void
    {
        $this->extracted();
    }

    protected function setupListOperation(): void
    {
        $this->extracted();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(GiftRequest::class);

        CRUD::field('user_id');
        CRUD::field('number');
        CRUD::field('is_paid');
        CRUD::field('paybox_order_id');
        CRUD::field('paybox_order_date');
        CRUD::field('activated_by');
        CRUD::field('card_id');
        CRUD::field('price');
        CRUD::field('promo_code');
        CRUD::field('phone');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function extracted(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::USER_ID)->label(Contract::T(Contract::USER));
        CRUD::column(Contract::NUMBER)->label(Contract::T(Contract::NUMBER));
        CRUD::column(Contract::IS_PAID)->label(Contract::T(Contract::IS_PAID))->type(Contract::SELECT_FROM_ARRAY)->options([
            1 => Contract::T(Contract::YES),
            0 => Contract::T(Contract::NO),
        ]);
        CRUD::column(Contract::PAYBOX_ORDER_ID)->label('Paybox ID');
        CRUD::column(Contract::PAYBOX_ORDER_DATE)->label('Paybox Дата');
        CRUD::column('activated_by');
        CRUD::column(Contract::CARD_ID)->label(Contract::T(Contract::CARD));
        CRUD::column(Contract::PRICE)->label(Contract::T(Contract::PRICE));
        CRUD::column(Contract::PROMO_CODE)->label(Contract::T(Contract::PROMO_CODE));
        CRUD::column(Contract::PHONE)->label(Contract::T(Contract::PHONE));
    }
}
