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

    public function get()
    {
        return $this->newsRepository->get();
    }

    public function getById($id)
    {
        return $this->newsRepository->getById($id);
    }

}
