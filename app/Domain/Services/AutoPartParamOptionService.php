<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartParamOption\AutoPartParamOptionRepositoryInterface;

class AutoPartParamOptionService
{
    protected AutoPartParamOptionRepositoryInterface $autoPartParamOptionRepository;
    public function __construct(AutoPartParamOptionRepositoryInterface $autoPartParamOptionRepository)
    {
        $this->autoPartParamOptionRepository    =   $autoPartParamOptionRepository;
    }

    public function count($where)
    {
        return $this->autoPartParamOptionRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->autoPartParamOptionRepository->get($skip,$take);
    }

}
