<?php

namespace App\Domain\Repositories\NotificationCount;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\NotificationCount;

class NotificationCountRepositoryEloquent implements NotificationCountRepositoryInterface
{
    use RepositoryEloquent;
    protected NotificationCount $model;
    public function __construct(NotificationCount $notificationCount)
    {
        $this->model    =   $notificationCount;
    }
}
