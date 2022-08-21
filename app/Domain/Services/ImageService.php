<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Image\ImageRepositoryInterface;

class ImageService extends MainService
{
    public ImageRepositoryInterface $imageRepository;
    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository  =   $imageRepository;
    }
}
