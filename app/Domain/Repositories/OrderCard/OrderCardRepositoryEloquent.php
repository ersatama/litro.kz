<?php

namespace App\Domain\Repositories\OrderCard;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\OrderCard;
use Illuminate\Database\Eloquent\Collection;

class OrderCardRepositoryEloquent implements OrderCardRepositoryInterface
{
    use RepositoryEloquent;
    protected OrderCard $model;
    public function __construct(OrderCard $orderCard)
    {
        $this->model    =   $orderCard;
    }

    public function analytics($data): Collection|array
    {
        $orderCard  =   OrderCard::query();
        $orderCard->with(Contract::CARD);
        if (array_key_exists(Contract::START_DATE,$data)) {
            $orderCard->whereBetween(Contract::START_DATE,[
                $data[Contract::START_DATE][Contract::FROM],
                $data[Contract::START_DATE][Contract::TO],
            ]);
        }
        if (array_key_exists(Contract::END_DATE,$data)) {
            $orderCard->whereBetween(Contract::END_DATE,[
                $data[Contract::END_DATE][Contract::FROM],
                $data[Contract::END_DATE][Contract::TO],
            ]);
        }
        if (array_key_exists(Contract::UTM_CAMPAIGN,$data)) {
            $orderCard->where(Contract::UTM_CAMPAIGN, $data[Contract::UTM_CAMPAIGN]);
        }
        return $orderCard->get();
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
