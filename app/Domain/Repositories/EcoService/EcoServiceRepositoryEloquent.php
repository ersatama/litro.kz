<?php

namespace App\Domain\Repositories\EcoService;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\EcoService;

class EcoServiceRepositoryEloquent implements EcoServiceRepositoryInterface
{
    use MainRepositoryEloquent;
    protected EcoService $model;
    public function __construct(EcoService $ecoService)
    {
        $this->model    =   $ecoService;
    }
}
