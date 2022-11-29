<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use const http\Client\Curl\Versions\CURL;

class CarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings('Автомобиль', 'Автомобили');
        if (backpack_user()->{Contract::ROLE_ID} !== 2) {
            CRUD::denyAccess('delete');
        }
    }

    protected function setupShowOperation()
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::ORDER_CARD_ID)->label(Contract::T(Contract::ORDER_CARD_ID));
        CRUD::column(Contract::CAR_MODEL_ID)->label(Contract::T(Contract::CAR_MODEL));
        CRUD::column(Contract::YEAR)->label(Contract::T(Contract::YEAR));
        CRUD::column(Contract::CAR_NUMBER)->label(Contract::T(Contract::CAR_NUMBER));
        CRUD::column(Contract::VIN)->label(Contract::T(Contract::VIN));
    }

    protected function setupListOperation()
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::ORDER_CARD_ID)->label(Contract::T(Contract::ORDER_CARD_ID));
        CRUD::column(Contract::CAR_MODEL_ID)->label(Contract::T(Contract::CAR_MODEL));
        CRUD::column(Contract::YEAR)->label(Contract::T(Contract::YEAR));
        CRUD::column(Contract::CAR_NUMBER)->label(Contract::T(Contract::CAR_NUMBER));
        CRUD::column(Contract::VIN)->label(Contract::T(Contract::VIN));
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CarRequest::class);

        CRUD::field(Contract::ORDER_CARD_ID)->label(Contract::T(Contract::ORDER_CARD_ID));
        CRUD::field(Contract::CAR_MODEL_ID)->label(Contract::T(Contract::CAR_MODEL));
        CRUD::field(Contract::YEAR)->label(Contract::T(Contract::YEAR));
        CRUD::field(Contract::CAR_NUMBER)->label(Contract::T(Contract::CAR_NUMBER));
        CRUD::field(Contract::VIN)->label(Contract::T(Contract::VIN));
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
