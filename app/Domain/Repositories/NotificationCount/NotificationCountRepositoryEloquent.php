<?php

namespace App\Domain\Repositories\NotificationCount;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\NotificationContract;
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


    public function countNotViewedByNotificationTypeIdAndUserId($userId, $ids)
    {
        $count  =   $this->model::where(Contract::USER_ID,$userId)->whereIn(Contract::ID,$ids)->count();
        return sizeof($ids) - $count;
    }
}
