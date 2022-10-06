<?php

namespace App\Domain\Repositories\Stock;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Stock;

class StockRepositoryEloquent implements StockRepositoryInterface
{
    use RepositoryEloquent;
    protected Stock $model;
    public function __construct(Stock $stock)
    {
        $this->model    =   $stock;
    }
}
