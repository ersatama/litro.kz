<?php

namespace App\Domain\Repositories\UserProfile;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\UserProfile;

class UserProfileRepositoryEloquent implements UserProfileRepositoryInterface
{
    use RepositoryEloquent;
    protected UserProfile $model;
    public function __construct(UserProfile $userProfile)
    {
        $this->model    =   $userProfile;
    }
}
