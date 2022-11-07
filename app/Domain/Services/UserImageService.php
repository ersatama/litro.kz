<?php

namespace App\Domain\Services;

use App\Domain\Repositories\UserImage\UserImageRepositoryInterface;

class UserImageService extends MainService
{
    public UserImageRepositoryInterface $userImageRepository;
    public function __construct(UserImageRepositoryInterface $userImageRepository)
    {
        $this->userImageRepository  =   $userImageRepository;
    }
}
