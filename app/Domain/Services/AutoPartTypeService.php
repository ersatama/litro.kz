<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartType\AutoPartTypeRepositoryInterface;

class AutoPartTypeService extends MainService
{
    public AutoPartTypeRepositoryInterface $autoPartTypeRepository;
    public function __construct(AutoPartTypeRepositoryInterface $autoPartTypeRepository)
    {
        $this->autoPartTypeRepository   =   $autoPartTypeRepository;
    }
}
