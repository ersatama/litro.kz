<?php

namespace App\Domain\Repositories\Image;

use App\Domain\Contracts\MainContract;
use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Image;

class ImageRepositoryEloquent implements ImageRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Image $model;

    public function __construct(Image $image)
    {
        $this->model    =   $image;
    }
}
