<?php

namespace App\Domain\Repositories\Place;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Place;

class PlaceRepositoryEloquent implements PlaceRepositoryInterface
{
    use RepositoryEloquent;
    protected Place $model;
    public function __construct(Place $place)
    {
        $this->model    =   $place;
    }
}
