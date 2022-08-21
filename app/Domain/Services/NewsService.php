<?php

namespace App\Domain\Services;

use App\Domain\Repositories\News\NewsRepositoryInterface;

class NewsService extends MainService
{
    public NewsRepositoryInterface $newsRepository;
    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository   =   $newsRepository;
    }
}
