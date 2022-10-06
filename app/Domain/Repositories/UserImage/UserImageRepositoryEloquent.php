<?php

namespace App\Domain\Repositories\UserImage;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\UserImage;

class UserImageRepositoryEloquent implements UserImageRepositoryInterface
{
    use RepositoryEloquent;
    protected UserImage $model;
    public function __construct(UserImage $userImage)
    {
        $this->model    =   $userImage;
    }
}
