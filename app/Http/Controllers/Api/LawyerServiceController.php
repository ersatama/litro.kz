<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\LawyerServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\LawyerService\LawyerServiceCollection;
use App\Http\Resources\LawyerService\LawyerServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LawyerServiceController extends Controller
{
    protected LawyerServiceService $lawyerServiceService;
    public function __construct(LawyerServiceService $lawyerServiceService)
    {
        $this->lawyerServiceService =   $lawyerServiceService;
    }

    /**
     * Получить список - LawyerService
     *
     * @group LawyerService
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->lawyerServiceService->lawyerServiceRepository->count([]),
            Contract::DATA  =>  new LawyerServiceCollection($this->lawyerServiceService->lawyerServiceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - LawyerService
     *
     * @group LawyerService
     */
    public function getById($id): Response|LawyerServiceResource|Application|ResponseFactory
    {
        if ($model = $this->lawyerServiceService->lawyerServiceRepository->getById($id)) {
            return new LawyerServiceResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
