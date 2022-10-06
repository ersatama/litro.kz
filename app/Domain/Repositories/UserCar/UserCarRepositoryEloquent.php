<?php

namespace App\Domain\Repositories\UserCar;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\UserCar;

class UserCarRepositoryEloquent implements UserCarRepositoryInterface
{
    use RepositoryEloquent;
    protected UserCar $model;
    public function __construct(UserCar $userCar)
    {
        $this->model    =   $userCar;
    }
}
