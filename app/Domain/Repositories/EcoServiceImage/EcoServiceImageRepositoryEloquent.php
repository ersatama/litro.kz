<?php

namespace App\Domain\Repositories\EcoServiceImage;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\EcoServiceImage;

class EcoServiceImageRepositoryEloquent implements EcoServiceImageRepositoryInterface
{
    use RepositoryEloquent;
    protected EcoServiceImage $model;
    public function __construct(EcoServiceImage $ecoServiceImage)
    {
        $this->model    =   $ecoServiceImage;
    }
}
