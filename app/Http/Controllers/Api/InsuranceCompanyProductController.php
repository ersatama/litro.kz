<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\InsuranceCompanyProductService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceCompanyProduct\InsuranceCompanyProductCollection;
use App\Http\Resources\InsuranceCompanyProduct\InsuranceCompanyProductResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceCompanyProductController extends Controller
{
    protected InsuranceCompanyProductService $insuranceCompanyProductService;
    public function __construct(InsuranceCompanyProductService $insuranceCompanyProductService)
    {
        $this->insuranceCompanyProductService   =   $insuranceCompanyProductService;
    }

    /**
     * Получить список - InsuranceCompanyProduct
     *
     * @group InsuranceCompanyProduct - СтрахованияКомпанияПродукт
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceCompanyProductService->insuranceCompanyProductRepository->count([]),
            MainContract::DATA  =>  new InsuranceCompanyProductCollection($this->insuranceCompanyProductService->insuranceCompanyProductRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через InsuranceCompanyID - InsuranceCompanyProduct
     *
     * @group InsuranceCompanyProduct - СтрахованияКомпанияПродукт
     */
    public function getByInsuranceCompanyId($insuranceCompanyId,$skip,$take): Response|InsuranceCompanyProductResource|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceCompanyProductService->insuranceCompanyProductRepository->count([
                MainContract::INSURANCE_COMPANY_ID  =>  $insuranceCompanyId
            ]),
            MainContract::DATA  =>  new InsuranceCompanyProductCollection($this->insuranceCompanyProductService->insuranceCompanyProductRepository->getByInsuranceCompanyId($insuranceCompanyId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceCompanyProduct
     *
     * @group InsuranceCompanyProduct - СтрахованияКомпанияПродукт
     */
    public function getById($id): Response|InsuranceCompanyProductResource|Application|ResponseFactory
    {
        if ($model = $this->insuranceCompanyProductService->insuranceCompanyProductRepository->getById($id)) {
            return new InsuranceCompanyProductResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
