<?php

namespace App\Domain\Repositories\RepeatedPartnerGiftCard;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\RepeatedPartnerGiftCard;

class RepeatedPartnerGiftCardRepositoryRepositoryEloquent implements RepeatedPartnerGiftCardRepositoryInterface
{
    use RepositoryEloquent;
    protected RepeatedPartnerGiftCard $model;
    public function __construct(RepeatedPartnerGiftCard $repeatedPartnerGiftCard)
    {
        $this->model    =   $repeatedPartnerGiftCard;
    }
}
