<?php

namespace App\Domain\Repositories\ThirdPartyApp;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\ThirdPartyApp;

class ThirdPartyAppRepositoryEloquent implements ThirdPartyAppRepositoryInterface
{
    use RepositoryEloquent;
    protected ThirdPartyApp $model;
    public function __construct(ThirdPartyApp $thirdPartyApp)
    {
        $this->model    =   $thirdPartyApp;
    }
}
