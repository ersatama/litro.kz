<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\ImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Image\ImageCollection;
use App\Http\Resources\Image\ImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    protected ImageService $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService =   $imageService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->imageService->imageRepository->count([]),
            MainContract::DATA  =>  new ImageCollection($this->imageService->imageRepository->get($skip,$take))
        ],200);
    }

    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->imageService->imageRepository->count([MainContract::USER_ID => $userId]),
            MainContract::DATA  =>  new ImageCollection($this->imageService->imageRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    public function getById($id): Response|ImageResource|Application|ResponseFactory
    {
        if ($image = $this->imageService->imageRepository->getById($id)) {
            return new ImageResource($image);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
