<?php

namespace App\Domain\Repositories\Stock;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Stock;

class StockRepositoryEloquent implements StockRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Stock $model;
    public function __construct(Stock $stock)
    {
        $this->model    =   $stock;
    }
}
