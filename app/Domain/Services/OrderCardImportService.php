<?php

namespace App\Domain\Services;

use App\Domain\Repositories\OrderCardImport\OrderCardImportRepositoryInterface;

class OrderCardImportService extends MainService
{
    public OrderCardImportRepositoryInterface $orderCardImportRepository;
    public function __construct(OrderCardImportRepositoryInterface $orderCardImportRepository)
    {
        $this->orderCardImportRepository    =   $orderCardImportRepository;
    }
}
