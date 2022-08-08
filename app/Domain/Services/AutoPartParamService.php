<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartParam\AutoPartParamRepositoryInterface;

class AutoPartParamService
{
    protected AutoPartParamRepositoryInterface $autoPartParamRepository;
    public function __construct(AutoPartParamRepositoryInterface $autoPartParamRepository)
    {
        $this->autoPartParamRepository  =   $autoPartParamRepository;
    }

    public function get()
    {
        return $this->autoPartParamRepository->get();
    }

}
