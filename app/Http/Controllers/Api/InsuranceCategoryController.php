<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\InsuranceCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceCategory\InsuranceCategoryCollection;
use App\Http\Resources\InsuranceCategory\InsuranceCategoryResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceCategoryController extends Controller
{
    protected InsuranceCategoryService $insuranceCategoryService;
    public function __construct(InsuranceCategoryService $insuranceCategoryService)
    {
        $this->insuranceCategoryService =   $insuranceCategoryService;
    }

    /**
     * Получить список - InsuranceCategory
     *
     * @group InsuranceCategory - СтрахованияКатегория
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->insuranceCategoryService->insuranceCategoryRepository->count([]),
            Contract::DATA  =>  new InsuranceCategoryCollection($this->insuranceCategoryService->insuranceCategoryRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceCategory
     *
     * @group InsuranceCategory - СтрахованияКатегория
     */
    public function getById($id): Response|InsuranceCategoryResource|Application|ResponseFactory
    {
        if ($model = $this->insuranceCategoryService->insuranceCategoryRepository->getById($id)) {
            return new InsuranceCategoryResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
