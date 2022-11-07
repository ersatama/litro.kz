<?php

namespace App\Domain\Services;

use App\Domain\Repositories\OrderCardOld\OrderCardOldRepositoryInterface;

class OrderCardOldService extends MainService
{
    public OrderCardOldRepositoryInterface $orderCardOldRepository;
    public function __construct(OrderCardOldRepositoryInterface $orderCardOldRepository)
    {
        $this->orderCardOldRepository   =   $orderCardOldRepository;
    }
}
