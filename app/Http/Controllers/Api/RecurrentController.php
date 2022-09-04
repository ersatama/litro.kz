<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\RecurrentService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Recurrent\RecurrentCollection;
use App\Http\Resources\Recurrent\RecurrentResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecurrentController extends Controller
{
    protected RecurrentService $recurrentService;
    public function __construct(RecurrentService $recurrentService)
    {
        $this->recurrentService =   $recurrentService;
    }

    /**
     * Получить список - Recurrent
     *
     * @group Recurrent - Повторяющийся
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->recurrentService->recurrentRepository->count([]),
            MainContract::DATA  =>  new RecurrentCollection($this->recurrentService->recurrentRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Recurrent
     *
     * @group Recurrent - Повторяющийся
     */
    public function getById($id): Response|Application|RecurrentResource|ResponseFactory
    {
        if ($model = $this->recurrentService->recurrentRepository->getById($id)) {
            return new RecurrentResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
