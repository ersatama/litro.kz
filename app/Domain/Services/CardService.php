<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Card\CardRepositoryInterface;

class CardService
{
    public CardRepositoryInterface $cardRepository;
    public function __construct(CardRepositoryInterface $cardRepository)
    {
        $this->cardRepository   =   $cardRepository;
    }
}
