<?php

namespace App\Domain\Services;

use App\Domain\Repositories\OrderService\OrderServiceRepositoryInterface;

class OrderServiceService extends MainService
{
    public OrderServiceRepositoryInterface $orderServiceRepository;
    public function __construct(OrderServiceRepositoryInterface $orderServiceRepository)
    {
        $this->orderServiceRepository   =   $orderServiceRepository;
    }
}
