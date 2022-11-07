<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Gift\GiftRepositoryInterface;

class GiftService extends MainService
{
    public GiftRepositoryInterface $giftRepository;
    public function __construct(GiftRepositoryInterface $giftRepository)
    {
        $this->giftRepository   =   $giftRepository;
    }
}
