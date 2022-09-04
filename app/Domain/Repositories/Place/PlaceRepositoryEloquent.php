<?php

namespace App\Domain\Repositories\Place;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Place;

class PlaceRepositoryEloquent implements PlaceRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Place $model;
    public function __construct(Place $place)
    {
        $this->model    =   $place;
    }
}
