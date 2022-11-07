<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CardCategory\CardCategoryRepositoryInterface;

class CardCategoryService extends MainService
{
    public CardCategoryRepositoryInterface $cardCategoryRepository;
    public function __construct(CardCategoryRepositoryInterface $cardCategoryRepository)
    {
        $this->cardCategoryRepository   =   $cardCategoryRepository;
    }
}
