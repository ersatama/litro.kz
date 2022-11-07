<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\InsuranceSelectOptionService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceSelectOption\InsuranceSelectOptionCollection;
use App\Http\Resources\InsuranceSelectOption\InsuranceSelectOptionResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceSelectOptionController extends Controller
{
    protected InsuranceSelectOptionService $insuranceSelectOptionService;
    public function __construct(InsuranceSelectOptionService $insuranceSelectOptionService)
    {
        $this->insuranceSelectOptionService =   $insuranceSelectOptionService;
    }

    /**
     * Получить список - InsuranceSelectOption
     *
     * @group InsuranceSelectOption
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->insuranceSelectOptionService->insuranceSelectOptionRepository->count([]),
            Contract::DATA  =>  new InsuranceSelectOptionCollection($this->insuranceSelectOptionService->insuranceSelectOptionRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceSelectOption
     *
     * @group InsuranceSelectOption
     */
    public function getById($id): Response|InsuranceSelectOptionResource|Application|ResponseFactory
    {
        if ($model = $this->insuranceSelectOptionService->insuranceSelectOptionRepository->getById($id)) {
            return new InsuranceSelectOptionResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
