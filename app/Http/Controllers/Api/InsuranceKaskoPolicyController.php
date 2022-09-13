<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\InsuranceKaskoPolicyService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceKaskoPolicy\InsuranceKaskoPolicyCollection;
use App\Http\Resources\InsuranceKaskoPolicy\InsuranceKaskoPolicyResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceKaskoPolicyController extends Controller
{
    protected InsuranceKaskoPolicyService $insuranceKaskoPolicyService;
    public function __construct(InsuranceKaskoPolicyService $insuranceKaskoPolicyService)
    {
        $this->insuranceKaskoPolicyService  =   $insuranceKaskoPolicyService;
    }

    /**
     * Получить список - InsuranceKaskoPolicy
     *
     * @group InsuranceKaskoPolicy - СтрахованияКаскоПолитика
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceKaskoPolicyService->insuranceKaskoPolicyRepository->count([]),
            MainContract::DATA  =>  new InsuranceKaskoPolicyCollection($this->insuranceKaskoPolicyService->insuranceKaskoPolicyRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - InsuranceKaskoPolicy
     *
     * @group InsuranceKaskoPolicy - СтрахованияКаскоПолитика
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceKaskoPolicyService->insuranceKaskoPolicyRepository->count([
                MainContract::USER_ID   =>  $userId
            ]),
            MainContract::DATA  =>  new InsuranceKaskoPolicyCollection($this->insuranceKaskoPolicyService->insuranceKaskoPolicyRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserCarID - InsuranceKaskoPolicy
     *
     * @group InsuranceKaskoPolicy - СтрахованияКаскоПолитика
     */
    public function getByUserCarId($userCarId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceKaskoPolicyService->insuranceKaskoPolicyRepository->count([
                MainContract::USER_CAR_ID   =>  $userCarId
            ]),
            MainContract::DATA  =>  new InsuranceKaskoPolicyCollection($this->insuranceKaskoPolicyService->insuranceKaskoPolicyRepository->getByUserCarId($userCarId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceKaskoPolicy
     *
     * @group InsuranceKaskoPolicy - СтрахованияКаскоПолитика
     */
    public function getById($id): Response|InsuranceKaskoPolicyResource|Application|ResponseFactory
    {
        if ($model = $this->insuranceKaskoPolicyService->insuranceKaskoPolicyRepository->getById($id)) {
            return new InsuranceKaskoPolicyResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
