<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartParam\AutoPartParamRepositoryInterface;

class AutoPartParamService
{
    public AutoPartParamRepositoryInterface $autoPartParamRepository;
    public function __construct(AutoPartParamRepositoryInterface $autoPartParamRepository)
    {
        $this->autoPartParamRepository  =   $autoPartParamRepository;
    }
}
