<?php

namespace App\Domain\Repositories\NotificationUser;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\NotificationUser;

class NotificationUserRepositoryEloquent implements NotificationUserRepositoryInterface
{
    use RepositoryEloquent;
    protected NotificationUser $model;
    public function __construct(NotificationUser $notificationUser)
    {
        $this->model    =   $notificationUser;
    }
}
