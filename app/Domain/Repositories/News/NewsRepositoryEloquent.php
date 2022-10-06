<?php

namespace App\Domain\Repositories\News;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\News;

class NewsRepositoryEloquent implements NewsRepositoryInterface
{
    use RepositoryEloquent;

    protected News $model;

    public function __construct(News $news)
    {
        $this->model    =   $news;
    }
}
