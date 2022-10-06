<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\AutoPartImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartImage\AutoPartImageCollection;
use App\Http\Resources\AutoPartImage\AutoPartImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoPartImageController extends Controller
{
    protected AutoPartImageService $autoPartImageService;
    public function __construct(AutoPartImageService $autoPartImageService)
    {
        $this->autoPartImageService =   $autoPartImageService;
    }

    /**
     * Получить список - AutoPartImage
     *
     * @group AutoPartImage
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->autoPartImageService->autoPartImageRepository->count([]),
            Contract::DATA  =>  new AutoPartImageCollection($this->autoPartImageService->autoPartImageRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через AutoPartID - AutoPartImage
     *
     * @group AutoPartImage
     */
    public function getByAutoPartId($autoPartId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->autoPartImageService->autoPartImageRepository->count([
                Contract::AUTO_PART_ID  =>  $autoPartId
            ]),
            Contract::DATA  =>  new AutoPartImageCollection($this->autoPartImageService->autoPartImageRepository->getByAutoPartId($autoPartId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - AutoPartImage
     *
     * @group AutoPartImage
     */
    public function getById($id): Response|AutoPartImageResource|Application|ResponseFactory
    {
        if ($model = $this->autoPartImageService->autoPartImageRepository->getById($id)) {
            return new AutoPartImageResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
