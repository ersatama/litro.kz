<?php

namespace App\Domain\Services;

use App\Domain\Repositories\NewsCategory\NewsCategoryRepositoryInterface;

class NewsCategoryService
{
    protected NewsCategoryRepositoryInterface $newsCategoryRepository;
    public function __construct(NewsCategoryRepositoryInterface $newsCategoryRepository)
    {
        $this->newsCategoryRepository   =   $newsCategoryRepository;
    }

    public function get()
    {
        return $this->newsCategoryRepository->get();
    }
}
