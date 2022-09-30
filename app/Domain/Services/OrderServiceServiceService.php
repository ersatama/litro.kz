<?php

namespace App\Domain\Services;

use App\Domain\Repositories\OrderServiceService\OrderServiceServiceRepositoryInterface;

class OrderServiceServiceService extends MainService
{
    public OrderServiceServiceRepositoryInterface $orderServiceServiceRepository;
    public function __construct(OrderServiceServiceRepositoryInterface $orderServiceServiceRepository)
    {
        $this->orderServiceServiceRepository    =   $orderServiceServiceRepository;
    }
}
