<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Image\ImageRepositoryInterface;

class ImageService
{
    protected ImageRepositoryInterface $imageRepository;
    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository  =   $imageRepository;
    }

    public function get($skip,$take)
    {
        return $this->imageRepository->get($skip,$take);
    }

    public function getByUserId($userId,$skip,$take)
    {
        return $this->imageRepository->getByUserId($userId,$skip,$take);
    }

    public function count($where)
    {
        return $this->imageRepository->count($where);
    }

    public function getById($id)
    {
        return $this->imageRepository->getById($id);
    }
}
