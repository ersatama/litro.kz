<?php

namespace App\Domain\Services;

use App\Domain\Repositories\NewsCategory\NewsCategoryRepositoryInterface;

class NewsCategoryService
{
    public NewsCategoryRepositoryInterface $newsCategoryRepository;
    public function __construct(NewsCategoryRepositoryInterface $newsCategoryRepository)
    {
        $this->newsCategoryRepository   =   $newsCategoryRepository;
    }
}
