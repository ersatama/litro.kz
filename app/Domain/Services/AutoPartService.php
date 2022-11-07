<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPart\AutoPartRepositoryInterface;

class AutoPartService extends MainService
{
    public AutoPartRepositoryInterface $autoPartRepository;
    public function __construct(AutoPartRepositoryInterface $autoPartRepository)
    {
        $this->autoPartRepository   =   $autoPartRepository;
    }
}
