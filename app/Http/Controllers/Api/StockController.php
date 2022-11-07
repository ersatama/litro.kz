<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\StockService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Stock\StockCollection;
use App\Http\Resources\Stock\StockResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StockController extends Controller
{
    protected StockService $stockService;
    public function __construct(StockService $stockService)
    {
        $this->stockService =   $stockService;
    }

    /**
     * Получить список - Stock
     *
     * @group Stock - Запас
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->stockService->stockRepository->count([]),
            Contract::DATA  =>  new StockCollection($this->stockService->stockRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Stock
     *
     * @group Stock - Запас
     */
    public function getById($id): Response|StockResource|Application|ResponseFactory
    {
        if ($model = $this->stockService->stockRepository->getById($id)) {
            return new StockResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
