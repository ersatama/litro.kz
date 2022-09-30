<?php

namespace App\Domain\Repositories\PartnerCard;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\PartnerCard;

class PartnerCardRepositoryEloquent implements PartnerCardRepositoryInterface
{
    use MainRepositoryEloquent;
    protected PartnerCard $model;
    public function __construct(PartnerCard $partnerCard)
    {
        $this->model    =   $partnerCard;
    }
}
