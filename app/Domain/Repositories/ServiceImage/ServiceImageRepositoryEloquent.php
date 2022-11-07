<?php

namespace App\Domain\Repositories\ServiceImage;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\ServiceImage;

class ServiceImageRepositoryEloquent implements ServiceImageRepositoryInterface
{
    use RepositoryEloquent;
    protected ServiceImage $model;
    public function __construct(ServiceImage $serviceImage)
    {
        $this->model    =   $serviceImage;
    }
}
