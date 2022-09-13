<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\LawyerContactService;
use App\Http\Controllers\Controller;
use App\Http\Resources\LawyerContact\LawyerContactCollection;
use App\Http\Resources\LawyerContact\LawyerContactResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LawyerContactController extends Controller
{
    protected LawyerContactService $lawyerContactService;
    public function __construct(LawyerContactService $lawyerContactService)
    {
        $this->lawyerContactService =   $lawyerContactService;
    }

    /**
     * Получить список - LawyerContact
     *
     * @group LawyerContact
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->lawyerContactService->lawyerContactRepository->count([]),
            MainContract::DATA  =>  new LawyerContactCollection($this->lawyerContactService->lawyerContactRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через LawyerID - LawyerContact
     *
     * @group LawyerContact
     */
    public function getByLawyerId($lawyerId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->lawyerContactService->lawyerContactRepository->count([
                MainContract::LAWYER_ID =>  $lawyerId
            ]),
            MainContract::DATA  =>  new LawyerContactCollection($this->lawyerContactService->lawyerContactRepository->getByLawyerId($lawyerId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - LawyerContact
     *
     * @group LawyerContact
     */
    public function getById($id): Response|LawyerContactResource|Application|ResponseFactory
    {
        if ($model = $this->lawyerContactService->lawyerContactRepository->getById($id)) {
            return new LawyerContactResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
