<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartCategory\AutoPartCategoryRepositoryInterface;

class AutoPartCategoryService
{
    protected AutoPartCategoryRepositoryInterface $autoPartCategoryRepository;
    public function __construct(AutoPartCategoryRepositoryInterface $autoPartCategoryRepository)
    {
        $this->autoPartCategoryRepository   =   $autoPartCategoryRepository;
    }

    public function get()
    {
        return $this->autoPartCategoryRepository->get();
    }

}
