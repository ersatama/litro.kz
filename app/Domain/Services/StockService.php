<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Stock\StockRepositoryInterface;

class StockService extends MainService
{
    public StockRepositoryInterface $stockRepository;
    public function __construct(StockRepositoryInterface $stockRepository)
    {
        $this->stockRepository  =   $stockRepository;
    }
}
