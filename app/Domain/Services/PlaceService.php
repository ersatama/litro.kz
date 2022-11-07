<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Place\PlaceRepositoryInterface;

class PlaceService extends MainService
{
    public PlaceRepositoryInterface $placeRepository;
    public function __construct(PlaceRepositoryInterface $placeRepository)
    {
        $this->placeRepository  =   $placeRepository;
    }
}
