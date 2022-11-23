<?php

namespace App\Domain\Services;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserContract;
use App\Domain\Repositories\User\UserRepositoryInterface;

class UserService extends MainService
{
    public UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository   =   $userRepository;
    }
}
