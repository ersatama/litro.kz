<?php

namespace App\Domain\Repositories\ThirdPartyApp;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\ThirdPartyApp;

class ThirdPartyAppRepositoryEloquent implements ThirdPartyAppRepositoryInterface
{
    use MainRepositoryEloquent;
    protected ThirdPartyApp $model;
    public function __construct(ThirdPartyApp $thirdPartyApp)
    {
        $this->model    =   $thirdPartyApp;
    }
}
