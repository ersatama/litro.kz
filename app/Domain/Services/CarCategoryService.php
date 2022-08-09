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

    public function get()
    {
        return $this->carCategoryRepository->get();
    }

}
