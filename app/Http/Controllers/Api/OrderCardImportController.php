<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\OrderCardImportService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCardImport\OrderCardImportCollection;
use App\Http\Resources\OrderCardImport\OrderCardImportResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderCardImportController extends Controller
{
    protected OrderCardImportService $orderCardImportService;
    public function __construct(OrderCardImportService $orderCardImportService)
    {
        $this->orderCardImportService   =   $orderCardImportService;
    }

    /**
     * Получить список - OrderCardImport
     *
     * @group OrderCardImport - ЗаказКартыИмпорт
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->orderCardImportService->orderCardImportRepository->count([]),
            MainContract::DATA  =>  new OrderCardImportCollection($this->orderCardImportService->orderCardImportRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - OrderCardImport
     *
     * @group OrderCardImport - ЗаказКартыИмпорт
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->orderCardImportService->orderCardImportRepository->count([
                MainContract::USER_ID   =>  $userId
            ]),
            MainContract::DATA  =>  new OrderCardImportCollection($this->orderCardImportService->orderCardImportRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - OrderCardImport
     *
     * @group OrderCardImport - ЗаказКартыИмпорт
     */
    public function getById($id): Response|OrderCardImportResource|Application|ResponseFactory
    {
        if ($model = $this->orderCardImportService->orderCardImportRepository->getById($id)) {
            return new OrderCardImportResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
