<?php

namespace App\Domain\Services;

use App\Domain\Repositories\OrderCard\OrderCardRepositoryInterface;

class OrderCardService extends MainService
{
    public OrderCardRepositoryInterface $orderCardRepository;
    public function __construct(OrderCardRepositoryInterface $orderCardRepository)
    {
        $this->orderCardRepository  =   $orderCardRepository;
    }
}
