<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarModel\CarModelRepositoryInterface;

class CarModelService
{
    protected CarModelRepositoryInterface $carModelRepository;
    public function __construct(CarModelRepositoryInterface $carModelRepository)
    {
        $this->carModelRepository   =   $carModelRepository;
    }

    public function count($where)
    {
        return $this->carModelRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->carModelRepository->get($skip,$take);
    }

    public function getById($id)
    {
        return $this->carModelRepository->getById($id);
    }

    public function getByCarBrandId($carBrandId,$skip,$take)
    {
        return $this->carModelRepository->getByCarBrandId($carBrandId,$skip,$take);
    }

}
