<?php

namespace App\Domain\Services;

use App\Domain\Repositories\OrderCardChosenService\OrderCardChosenServiceRepositoryInterface;

class OrderCardChosenServiceService extends MainService
{
    public OrderCardChosenServiceRepositoryInterface $orderCardChosenServiceRepository;
    public function __construct(OrderCardChosenServiceRepositoryInterface $orderCardChosenServiceRepository)
    {
        $this->orderCardChosenServiceRepository =   $orderCardChosenServiceRepository;
    }
}
