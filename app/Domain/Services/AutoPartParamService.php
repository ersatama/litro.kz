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

    public function count($where)
    {
        return $this->autoPartParamRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->autoPartParamRepository->get($skip,$take);
    }

}
