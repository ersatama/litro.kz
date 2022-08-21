<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Category\CategoryRepositoryInterface;

class CategoryService
{
    public CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository   =   $categoryRepository;
    }
}
