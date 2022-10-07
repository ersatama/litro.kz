<?php

namespace App\Domain\Repositories\Role;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Role;

class RoleRepositoryEloquent implements RoleRepositoryInterface
{
    use RepositoryEloquent;
    protected Role $model;
    public function __construct(Role $role)
    {
        $this->model    =   $role;
    }
}
