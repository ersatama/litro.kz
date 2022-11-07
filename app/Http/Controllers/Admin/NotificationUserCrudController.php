<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\NotificationUserRequest;
use App\Models\NotificationUser;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NotificationUserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class NotificationUserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(NotificationUser::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/notification-user');
        CRUD::setEntityNameStrings('Уведомления пользователя', 'Уведомление пользователей');
    }

    protected function setupListOperation()
    {
        CRUD::column(Contract::USER)->type(Contract::SELECT)->label(Contract::T(Contract::USER));
        CRUD::column('title');
        CRUD::column('title_en');
        CRUD::column('title_kz');
        CRUD::column('views');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(NotificationUserRequest::class);

        CRUD::field(Contract::USER_ID)->label(Contract::ID . ' - ' . Contract::T(Contract::USER))->type(Contract::TEXT);
        CRUD::field(Contract::TITLE)->label(Contract::T(Contract::TITLE));
        CRUD::field(Contract::TITLE_EN)->label(Contract::T(Contract::TITLE_EN));
        CRUD::field(Contract::TITLE_KZ)->label(Contract::T(Contract::TITLE_KZ));
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
