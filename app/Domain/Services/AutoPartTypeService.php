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

    public function get()
    {
        return $this->autoPartTypeRepository->get();
    }

}
