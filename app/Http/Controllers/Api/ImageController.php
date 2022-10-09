<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Helpers\Image;
use App\Domain\Requests\Image\ImageCreateRequest;
use App\Domain\Services\ImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Image\ImageCollection;
use App\Http\Resources\Image\ImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ImageController extends Controller
{
    protected ImageService $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService =   $imageService;
    }

    /**
     * @throws ValidationException
     */
    public function create(ImageCreateRequest $imageCreateRequest, Image $image): ImageResource
    {
        $data   =   $imageCreateRequest->checked();
        return new ImageResource($this->imageService->imageRepository->create(array_merge(
            $image->save($data[Contract::IMAGE]),
            $data
        )));
    }

    /**
     * Получить список - Image
     *
     * @group Image - Картинка
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->imageService->imageRepository->count([]),
            Contract::DATA  =>  new ImageCollection($this->imageService->imageRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - Image
     *
     * @group Image - Картинка
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->imageService->imageRepository->count([Contract::USER_ID => $userId]),
            Contract::DATA  =>  new ImageCollection($this->imageService->imageRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Image
     *
     * @group Image - Картинка
     */
    public function getById($id): Response|ImageResource|Application|ResponseFactory
    {
        if ($image = $this->imageService->imageRepository->getById($id)) {
            return new ImageResource($image);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
