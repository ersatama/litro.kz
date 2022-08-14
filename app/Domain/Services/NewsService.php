<?php

namespace App\Domain\Services;

use App\Domain\Repositories\News\NewsRepositoryInterface;

class NewsService
{
    protected NewsRepositoryInterface $newsRepository;
    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository   =   $newsRepository;
    }

    public function count($where)
    {
        return $this->newsRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->newsRepository->get($skip,$take);
    }

    public function getById($id)
    {
        return $this->newsRepository->getById($id);
    }

}
