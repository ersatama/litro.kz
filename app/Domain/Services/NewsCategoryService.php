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

    public function count($where)
    {
        return $this->newsCategoryRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->newsCategoryRepository->get($skip,$take);
    }
}
