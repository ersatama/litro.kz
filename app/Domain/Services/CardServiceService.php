<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CardService\CardServiceRepositoryInterface;

class CardServiceService extends MainService
{
    public CardServiceRepositoryInterface $cardServiceRepository;
    public function __construct(CardServiceRepositoryInterface $cardServiceRepository)
    {
        $this->cardServiceRepository    =   $cardServiceRepository;
    }
}
