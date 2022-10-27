<?php

namespace App\Domain\Repositories\NotificationUser;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\DB;

class NotificationUserRepositoryEloquent implements NotificationUserRepositoryInterface
{
    use RepositoryEloquent;
    protected NotificationUser $model;
    public function __construct(NotificationUser $notificationUser)
    {
        $this->model    =   $notificationUser;
    }

    public function updateViewByUserId($userId)
    {
        $this->model->where(Contract::USER_ID,$userId)->update([
            Contract::VIEWS =>  true
        ]);
    }
}
