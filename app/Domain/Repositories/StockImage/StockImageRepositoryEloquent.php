<?php

namespace App\Domain\Repositories\StockImage;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\StockImage;

class StockImageRepositoryEloquent implements StockImageRepositoryInterface
{
    use RepositoryEloquent;
    protected StockImage $model;
    public function __construct(StockImage $stockImage)
    {
        $this->model    =   $stockImage;
    }
}
