<?php

namespace App\Domain\Repositories\UserCar;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\UserCar;

class UserCarRepositoryEloquent implements UserCarRepositoryInterface
{
    use MainRepositoryEloquent;
    protected UserCar $model;
    public function __construct(UserCar $userCar)
    {
        $this->model    =   $userCar;
    }
}
