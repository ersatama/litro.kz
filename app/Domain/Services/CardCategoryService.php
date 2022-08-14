<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CardCategory\CardCategoryRepositoryInterface;

class CardCategoryService
{
    protected CardCategoryRepositoryInterface $cardCategoryRepository;
    public function __construct(CardCategoryRepositoryInterface $cardCategoryRepository)
    {
        $this->cardCategoryRepository   =   $cardCategoryRepository;
    }

    public function get($skip,$take)
    {
        return $this->cardCategoryRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->cardCategoryRepository->count($where);
    }

}
