<?php

namespace App\Domain\Repositories\PartnerCard;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\PartnerCard;

class PartnerCardRepositoryEloquent implements PartnerCardRepositoryInterface
{
    use RepositoryEloquent;
    protected PartnerCard $model;
    public function __construct(PartnerCard $partnerCard)
    {
        $this->model    =   $partnerCard;
    }

    public static function count()
    {
        return PartnerCard::count();
    }
}
