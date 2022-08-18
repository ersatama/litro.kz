<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Card\CardRepositoryInterface;

class CardService
{
    protected CardRepositoryInterface $cardRepository;
    public function __construct(CardRepositoryInterface $cardRepository)
    {
        $this->cardRepository   =   $cardRepository;
    }

    public function getByUserId($userId,$skip,$take)
    {
        return $this->cardRepository->getByUserId($userId,$skip,$take);
    }

    public function get($skip,$take)
    {
        return $this->cardRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->cardRepository->count($where);
    }

    public function getById($id)
    {
        return $this->cardRepository->getById($id);
    }

}
