<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\Contract;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class RoleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(Role::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/role');
        CRUD::setEntityNameStrings(Contract::T(Contract::ROLE), Contract::T(Contract::ROLES));
    }

    protected function setupShowOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::NAME)->label(Contract::T(Contract::NAME));
    }

    protected function setupListOperation(): void
    {
        CRUD::column(Contract::ID)->label(Contract::T(Contract::ID))->type(Contract::NUMBER);
        CRUD::column(Contract::NAME)->label(Contract::T(Contract::NAME));
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(RoleRequest::class);

        CRUD::field(Contract::NAME)->label(Contract::T(Contract::NAME));
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
