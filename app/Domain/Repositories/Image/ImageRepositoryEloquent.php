<?php

namespace App\Domain\Repositories\Image;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Image;

class ImageRepositoryEloquent implements ImageRepositoryInterface
{
    use RepositoryEloquent;

    protected Image $model;

    public function __construct(Image $image)
    {
        $this->model    =   $image;
    }
}
