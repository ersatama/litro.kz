<?php

namespace App\Domain\Repositories\EcoService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\EcoService;

class EcoServiceRepositoryEloquent implements EcoServiceRepositoryInterface
{
    use RepositoryEloquent;
    protected EcoService $model;
    public function __construct(EcoService $ecoService)
    {
        $this->model    =   $ecoService;
    }

    public static function count()
    {
        return EcoService::count();
    }
}
