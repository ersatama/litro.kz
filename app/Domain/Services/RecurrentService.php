<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Recurrent\RecurrentRepositoryInterface;

class RecurrentService extends MainService
{
    public RecurrentRepositoryInterface $recurrentRepository;
    public function __construct(RecurrentRepositoryInterface $recurrentRepository)
    {
        $this->recurrentRepository  =   $recurrentRepository;
    }
}
