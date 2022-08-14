<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarCategory\CarCategoryRepositoryInterface;

class CarCategoryService
{
    protected CarCategoryRepositoryInterface $carCategoryRepository;
    public function __construct(CarCategoryRepositoryInterface $carCategoryRepository)
    {
        $this->carCategoryRepository    =   $carCategoryRepository;
    }

    public function count($where)
    {
        return $this->carCategoryRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->carCategoryRepository->get($skip,$take);
    }

}
