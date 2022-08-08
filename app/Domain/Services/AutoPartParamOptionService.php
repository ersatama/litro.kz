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

    public function get()
    {
        return $this->autoPartParamOptionRepository->get();
    }

}
