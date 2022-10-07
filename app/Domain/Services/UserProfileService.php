<?php

namespace App\Domain\Services;

use App\Domain\Repositories\UserProfile\UserProfileRepositoryInterface;

class UserProfileService extends MainService
{
    public UserProfileRepositoryInterface $userProfileRepository;
    public function __construct(UserProfileRepositoryInterface $userProfileRepository)
    {
        $this->userProfileRepository    =   $userProfileRepository;
    }
}
