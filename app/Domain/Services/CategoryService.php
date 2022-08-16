<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Category\CategoryRepositoryInterface;

class CategoryService
{
    protected CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository   =   $categoryRepository;
    }

    public function get($skip,$take)
    {
        return $this->categoryRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->categoryRepository->count($where);
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }
}
