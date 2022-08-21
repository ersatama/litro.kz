<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CardRange\CardRangeRepositoryInterface;

class CardRangeService extends MainService
{
    public CardRangeRepositoryInterface $cardRangeRepository;
    public function __construct(CardRangeRepositoryInterface $cardRangeRepository)
    {
        $this->cardRangeRepository  =   $cardRangeRepository;
    }
}
