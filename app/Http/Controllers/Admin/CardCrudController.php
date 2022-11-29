<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\CardRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CardCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Card::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/card');
        CRUD::setEntityNameStrings('Карта', 'Карты');
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    protected function extracted()
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID));
        CRUD::column(Contract::IMAGE.'.'.Contract::JPG)
            ->label(Contract::T(Contract::IMAGE))->type(Contract::IMAGE);
        CRUD::column(Contract::CARD_CATEGORY_ID)->label(Contract::T(Contract::CARD_CATEGORY));
        CRUD::column('title');
        CRUD::column('title_kz');
        CRUD::column('title_en');
        CRUD::column('description');
        CRUD::column('description_kz');
        CRUD::column('description_en');
        CRUD::column('detail');
        CRUD::column('detail_kz');
        CRUD::column('detail_en');
        CRUD::column('price');
        CRUD::column('rank');
        CRUD::column('allowed_drivers');
        CRUD::column('allowed_cars');
        CRUD::column('is_active');
        CRUD::column('client_discount');
        CRUD::column('price_monthly');
        CRUD::column('price_monthly_first_month');
        CRUD::column('referral_price_monthly');
        CRUD::column('referral_price_monthly_first_month');
        CRUD::column('is_for_corporate_use');
        CRUD::column('icon');
        CRUD::column('icon_selected');
        CRUD::column('img');
        CRUD::column('colors');
        CRUD::column('allowed_chooseable_services');
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
        CRUD::setValidation(CardRequest::class);

        CRUD::field('image_id');
        CRUD::field('card_category_id');
        CRUD::field('title');
        CRUD::field('title_kz');
        CRUD::field('title_en');
        CRUD::field('description');
        CRUD::field('description_kz');
        CRUD::field('description_en');
        CRUD::field('detail');
        CRUD::field('detail_kz');
        CRUD::field('detail_en');
        CRUD::field('price');
        CRUD::field('rank');
        CRUD::field('allowed_drivers');
        CRUD::field('allowed_cars');
        CRUD::field('is_active');
        CRUD::field('client_discount');
        CRUD::field('price_monthly');
        CRUD::field('price_monthly_first_month');
        CRUD::field('referral_price_monthly');
        CRUD::field('referral_price_monthly_first_month');
        CRUD::field('is_for_corporate_use');
        CRUD::field('icon');
        CRUD::field('icon_selected');
        CRUD::field('img');
        CRUD::field('colors');
        CRUD::field('allowed_chooseable_services');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
