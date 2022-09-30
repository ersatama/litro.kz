<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\LawyerServicePivotService;
use App\Http\Controllers\Controller;
use App\Http\Resources\LawyerServicePivot\LawyerServicePivotCollection;
use App\Http\Resources\LawyerServicePivot\LawyerServicePivotResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LawyerServicePivotController extends Controller
{
    protected LawyerServicePivotService $lawyerServicePivotService;
    public function __construct(LawyerServicePivotService $lawyerServicePivotService)
    {
        $this->lawyerServicePivotService    =   $lawyerServicePivotService;
    }

    /**
     * Получить список - LawyerServicePivot
     *
     * @group LawyerServicePivot
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->lawyerServicePivotService->lawyerServicePivotRepository->count([]),
            Contract::DATA  =>  new LawyerServicePivotCollection($this->lawyerServicePivotService->lawyerServicePivotRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через LawyerID - LawyerServicePivot
     *
     * @group LawyerServicePivot
     */
    public function getByLawyerId($lawyerId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->lawyerServicePivotService->lawyerServicePivotRepository->count([
                Contract::LAWYER_ID =>  $lawyerId
            ]),
            Contract::DATA  =>  new LawyerServicePivotCollection($this->lawyerServicePivotService->lawyerServicePivotRepository->getByLawyerId($lawyerId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - LawyerServicePivot
     *
     * @group LawyerServicePivot
     */
    public function getById($id): Response|LawyerServicePivotResource|Application|ResponseFactory
    {
        if ($model = $this->lawyerServicePivotService->lawyerServicePivotRepository->getById($id)) {
            return new LawyerServicePivotResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
