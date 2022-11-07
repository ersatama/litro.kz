<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartCategory\AutoPartCategoryRepositoryInterface;

class AutoPartCategoryService extends MainService
{
    public AutoPartCategoryRepositoryInterface $autoPartCategoryRepository;
    public function __construct(AutoPartCategoryRepositoryInterface $autoPartCategoryRepository)
    {
        $this->autoPartCategoryRepository   =   $autoPartCategoryRepository;
    }
}
