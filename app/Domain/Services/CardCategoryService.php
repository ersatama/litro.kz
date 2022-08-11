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

    public function get()
    {
        return $this->cardCategoryRepository->get();
    }

}
