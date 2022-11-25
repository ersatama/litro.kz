<?php

namespace App\Domain\Repositories\Notification;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\NotificationContract;
use App\Domain\Contracts\NotificationCountContract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class NotificationRepositoryEloquent implements NotificationRepositoryInterface
{
    use RepositoryEloquent;
    protected Notification $model;
    public function __construct(Notification $notification)
    {
        $this->model    =   $notification;
    }

    public function getIds($notificationTypeId)
    {
        return $this->model::where(Contract::NOTIFICATION_TYPE_ID, $notificationTypeId)->get(Contract::ID);
    }

    public function countNotViewed($userId, $notificationTypeId, $cityId)
    {
        return DB::table(NotificationContract::TABLE)
            ->rightJoin(NotificationCountContract::TABLE,join('.',[
                NotificationContract::TABLE,
                Contract::ID
            ]),'=',join('.',[
                NotificationCountContract::TABLE,
                Contract::NOTIFICATION_ID
            ]))
            ->select(DB::raw('count('.join('.',[NotificationContract::TABLE,Contract::ID]).') as count'))
            ->where([
                [
                    join('.',[
                        NotificationCountContract::TABLE,
                        Contract::USER_ID
                    ]),$userId
                ],
                [
                    join('.',[
                        NotificationContract::TABLE,
                        Contract::NOTIFICATION_TYPE_ID
                    ]),$notificationTypeId
                ],
                [
                    join('.',[
                        NotificationContract::TABLE,
                        Contract::CITY_ID
                    ]),$cityId
                ]
            ]);
    }

    public static function count($where = [])
    {
        return Notification::count();
    }
}
