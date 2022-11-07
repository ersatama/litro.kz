<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\LawyerService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Lawyer\LawyerCollection;
use App\Http\Resources\Lawyer\LawyerResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LawyerController extends Controller
{
    protected LawyerService $lawyerService;
    public function __construct(LawyerService $lawyerService)
    {
        $this->lawyerService    =   $lawyerService;
    }

    /**
     * Получить список - Lawyer
     *
     * @group Lawyer
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->lawyerService->lawyerRepository->count([]),
            Contract::DATA  =>  new LawyerCollection($this->lawyerService->lawyerRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Lawyer
     *
     * @group Lawyer
     */
    public function getById($id): LawyerResource|Response|Application|ResponseFactory
    {
        if ($model = $this->lawyerService->lawyerRepository->getById($id)) {
            return new LawyerResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
