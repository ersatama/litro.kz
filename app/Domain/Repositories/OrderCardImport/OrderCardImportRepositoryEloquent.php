<?php

namespace App\Domain\Repositories\OrderCardImport;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\OrderCardImport;

class OrderCardImportRepositoryEloquent implements OrderCardImportRepositoryInterface
{
    use MainRepositoryEloquent;
    protected OrderCardImport $model;
    public function __construct(OrderCardImport $orderCardImport)
    {
        $this->model    =   $orderCardImport;
    }
}
