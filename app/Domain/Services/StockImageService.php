<?php

namespace App\Domain\Services;

use App\Domain\Repositories\StockImage\StockImageRepositoryInterface;

class StockImageService extends MainService
{
    public StockImageRepositoryInterface $stockImageRepository;
    public function __construct(StockImageRepositoryInterface $stockImageRepository)
    {
        $this->stockImageRepository =   $stockImageRepository;
    }
}
