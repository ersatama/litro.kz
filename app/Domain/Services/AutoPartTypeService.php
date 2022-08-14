<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartType\AutoPartTypeRepositoryInterface;

class AutoPartTypeService
{
    protected AutoPartTypeRepositoryInterface $autoPartTypeRepository;
    public function __construct(AutoPartTypeRepositoryInterface $autoPartTypeRepository)
    {
        $this->autoPartTypeRepository   =   $autoPartTypeRepository;
    }

    public function count($where)
    {
        return $this->autoPartTypeRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->autoPartTypeRepository->get($skip,$take);
    }

}
