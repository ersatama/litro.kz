<?php

namespace App\Domain\Services;

use App\Domain\Repositories\User\UserRepositoryInterface;

class UserService extends MainService
{
    public UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository   =   $userRepository;
    }

}
