<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarCategory\CarCategoryRepositoryInterface;

class CarCategoryService extends MainService
{
    public CarCategoryRepositoryInterface $carCategoryRepository;
    public function __construct(CarCategoryRepositoryInterface $carCategoryRepository)
    {
        $this->carCategoryRepository    =   $carCategoryRepository;
    }
}
