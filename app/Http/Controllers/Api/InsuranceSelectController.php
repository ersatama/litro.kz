<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\InsuranceSelectService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceSelect\InsuranceSelectCollection;
use App\Http\Resources\InsuranceSelect\InsuranceSelectResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceSelectController extends Controller
{
    protected InsuranceSelectService $insuranceSelectService;
    public function __construct(InsuranceSelectService $insuranceSelectService)
    {
        $this->insuranceSelectService   =   $insuranceSelectService;
    }

    /**
     * Получить список - InsuranceSelect
     *
     * @group InsuranceSelect
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceSelectService->insuranceSelectRepository->count([]),
            MainContract::DATA  =>  new InsuranceSelectCollection($this->insuranceSelectService->insuranceSelectRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceSelect
     *
     * @group InsuranceSelect
     */
    public function getById($id): InsuranceSelectResource|Response|Application|ResponseFactory
    {
        if ($model = $this->insuranceSelectService->insuranceSelectRepository->getById($id)) {
            return new InsuranceSelectResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
