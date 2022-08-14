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

    public function count($where)
    {
        return $this->autoPartCategoryRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->autoPartCategoryRepository->get($skip,$take);
    }

}
