<?php

namespace App\Domain\Services;

use App\Domain\Repositories\UserCar\UserCarRepositoryInterface;

class UserCarService extends MainService
{
    public UserCarRepositoryInterface $userCarRepository;
    public function __construct(UserCarRepositoryInterface $userCarRepository)
    {
        $this->userCarRepository    =   $userCarRepository;
    }
}
