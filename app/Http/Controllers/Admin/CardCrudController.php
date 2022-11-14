<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\CardRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CardCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CardCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Card::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/card');
        CRUD::setEntityNameStrings('card', 'cards');
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('image_id');
        CRUD::column('card_category_id');
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

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
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
