<?php

namespace App\Domain\Repositories\User;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\User;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    use MainRepositoryEloquent;
    protected User $model;
    public function __construct(User $user)
    {
        $this->model    =   $user;
    }
}
