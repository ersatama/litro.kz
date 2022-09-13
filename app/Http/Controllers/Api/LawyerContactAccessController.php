<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\LawyerContactAccessService;
use App\Http\Controllers\Controller;
use App\Http\Resources\LawyerContactAccess\LawyerContactAccessCollection;
use App\Http\Resources\LawyerContactAccess\LawyerContactAccessResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LawyerContactAccessController extends Controller
{
    protected LawyerContactAccessService $lawyerContactAccessService;
    public function __construct(LawyerContactAccessService $lawyerContactAccessService)
    {
        $this->lawyerContactAccessService   =   $lawyerContactAccessService;
    }

    /**
     * Получить список - LawyerContactAccess
     *
     * @group LawyerContactAccess
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->lawyerContactAccessService->lawyerContactAccessRepository->count([]),
            MainContract::DATA  =>  new LawyerContactAccessCollection($this->lawyerContactAccessService->lawyerContactAccessRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через LawyerID - LawyerContactAccess
     *
     * @group LawyerContactAccess
     */
    public function getByLawyerId($lawyerId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->lawyerContactAccessService->lawyerContactAccessRepository->count([
                MainContract::LAWYER_ID =>  $lawyerId
            ]),
            MainContract::DATA  =>  new LawyerContactAccessCollection($this->lawyerContactAccessService->lawyerContactAccessRepository->getByLawyerId($lawyerId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - LawyerContactAccess
     *
     * @group LawyerContactAccess
     */
    public function getById($id): Response|LawyerContactAccessResource|Application|ResponseFactory
    {
        if ($model = $this->lawyerContactAccessService->lawyerContactAccessRepository->getById($id)) {
            return new LawyerContactAccessResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
