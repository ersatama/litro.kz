<?php

namespace App\Domain\Repositories\User;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\User;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    use RepositoryEloquent;
    protected User $model;
    public function __construct(User $user)
    {
        $this->model    =   $user;
    }

    public static function count()
    {
        return User::count();
    }

    public static function countActive()
    {
        return User::whereNull(Contract::DELETED_AT)->count();
    }

    public static function countMale()
    {
        return User::where(Contract::GENDER,'like','m%')->count();
    }

    public static function countFemale()
    {
        return User::where(Contract::GENDER,'like','f%')->count();
    }
}
