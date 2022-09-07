<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\InsuranceCompanyService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceCompany\InsuranceCompanyCollection;
use App\Http\Resources\InsuranceCompany\InsuranceCompanyResource;
use App\Models\InsuranceCompany;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceCompanyController extends Controller
{
    protected InsuranceCompanyService $insuranceCompanyService;
    public function __construct(InsuranceCompanyService $insuranceCompanyService)
    {
        $this->insuranceCompanyService  =   $insuranceCompanyService;
    }

    /**
     * Получить список - InsuranceCompany
     *
     * @group InsuranceCompany - СтраховаяКомпания
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceCompanyService->insuranceCompanyRepository->count([]),
            MainContract::DATA  =>  new InsuranceCompanyCollection($this->insuranceCompanyService->insuranceCompanyRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceCompany
     *
     * @group InsuranceCompany - СтраховаяКомпания
     */
    public function getById($id): Response|InsuranceCompanyResource|Application|ResponseFactory
    {
        if ($model = $this->insuranceCompanyService->insuranceCompanyRepository->getById($id)) {
            return new  InsuranceCompanyResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
