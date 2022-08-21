<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartParamOption\AutoPartParamOptionRepositoryInterface;

class AutoPartParamOptionService
{
    public AutoPartParamOptionRepositoryInterface $autoPartParamOptionRepository;
    public function __construct(AutoPartParamOptionRepositoryInterface $autoPartParamOptionRepository)
    {
        $this->autoPartParamOptionRepository    =   $autoPartParamOptionRepository;
    }
}
