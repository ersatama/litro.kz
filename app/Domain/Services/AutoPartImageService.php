<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPartImage\AutoPartImageRepositoryInterface;

class AutoPartImageService extends MainService
{
    public AutoPartImageRepositoryInterface $autoPartImageRepository;
    public function __construct(AutoPartImageRepositoryInterface $autoPartImageRepository)
    {
        $this->autoPartImageRepository  =   $autoPartImageRepository;
    }
}
