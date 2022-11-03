<?php

namespace App\Domain\Repositories\OrderCard;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\OrderCard;

class OrderCardRepositoryEloquent implements OrderCardRepositoryInterface
{
    use RepositoryEloquent;
    protected OrderCard $model;
    public function __construct(OrderCard $orderCard)
    {
        $this->model    =   $orderCard;
    }

    public static function count()
    {
        return OrderCard::count();
    }

    public static function countActive()
    {
        return OrderCard::where(Contract::STATUS,'like','Актив%')->count();
    }

    public static function countPaid()
    {
        return OrderCard::where(Contract::STATUS,'like','Оплач%')->count();
    }

    public static function countUnpaid()
    {
        return OrderCard::where(Contract::STATUS,'like','Не оплач%')->count();
    }

    public static function countAbort()
    {
        return OrderCard::where(Contract::STATUS,'like','Отмен%')->orWhere(Contract::STATUS,null)->count();
    }
}
