<?php

namespace App\Domain\Services;

use App\Domain\Repositories\AutoPart\AutoPartRepositoryInterface;

class AutoPartService
{
    protected AutoPartRepositoryInterface $autoPartRepository;
    public function __construct(AutoPartRepositoryInterface $autoPartRepository)
    {
        $this->autoPartRepository   =   $autoPartRepository;
    }

    public function count($where)
    {
        return $this->autoPartRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->autoPartRepository->get($skip,$take);
    }

    public function getById($id)
    {
        return $this->autoPartRepository->getById($id);
    }

}
