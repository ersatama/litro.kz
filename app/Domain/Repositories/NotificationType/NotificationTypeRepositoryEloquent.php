<?php

namespace App\Domain\Repositories\NotificationType;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\NotificationType;

class NotificationTypeRepositoryEloquent implements NotificationTypeRepositoryInterface
{
    use RepositoryEloquent;
    protected NotificationType $model;
    public function __construct(NotificationType $notificationType)
    {
        $this->model    =   $notificationType;
    }
}
