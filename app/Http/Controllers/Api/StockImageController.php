<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\StockImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockImage\StockImageCollection;
use App\Http\Resources\StockImage\StockImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StockImageController extends Controller
{
    protected StockImageService $stockImageService;
    public function __construct(StockImageService $stockImageService)
    {
        $this->stockImageService    =   $stockImageService;
    }

    /**
     * Получить список - StockImage
     *
     * @group StockImage
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->stockImageService->stockImageRepository->count([]),
            Contract::DATA  =>  new StockImageCollection($this->stockImageService->stockImageRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через StockID - StockImage
     *
     * @group StockImage
     */
    public function getByStockId($stockId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->stockImageService->stockImageRepository->count([
                Contract::STOCK_ID  =>  $stockId
            ]),
            Contract::DATA  =>  new StockImageCollection($this->stockImageService->stockImageRepository->getByStockId($stockId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - StockImage
     *
     * @group StockImage
     */
    public function getById($id): Response|StockImageResource|Application|ResponseFactory
    {
        if ($model = $this->stockImageService->stockImageRepository->getById($id)) {
            return new StockImageResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
