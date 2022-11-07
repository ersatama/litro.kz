<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\InsuranceCompanyRequestLogService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceCompanyRequestLog\InsuranceCompanyRequestLogCollection;
use App\Http\Resources\InsuranceCompanyRequestLog\InsuranceCompanyRequestLogResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceCompanyRequestLogController extends Controller
{
    protected InsuranceCompanyRequestLogService $insuranceCompanyRequestLogService;
    public function __construct(InsuranceCompanyRequestLogService $insuranceCompanyRequestLogService)
    {
        $this->insuranceCompanyRequestLogService    =   $insuranceCompanyRequestLogService;
    }

    /**
     * Получить список - InsuranceCompanyRequestLog
     *
     * @group InsuranceCompanyRequestLog - СтрахованияКомпанияЗапросЛог
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->insuranceCompanyRequestLogService->insuranceCompanyRequestLogRepository->count([]),
            Contract::DATA  =>  new InsuranceCompanyRequestLogCollection($this->insuranceCompanyRequestLogService->insuranceCompanyRequestLogRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через InsuranceCompanyID - InsuranceCompanyRequestLog
     *
     * @group InsuranceCompanyRequestLog - СтрахованияКомпанияЗапросЛог
     */
    public function getByInsuranceCompanyId($insuranceCompanyId,$skip,$take): Response|InsuranceCompanyRequestLogCollection|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->insuranceCompanyRequestLogService->insuranceCompanyRequestLogRepository->count([
                Contract::INSURANCE_COMPANY_ID  =>  $insuranceCompanyId
            ]),
            Contract::DATA  =>  new InsuranceCompanyRequestLogCollection($this->insuranceCompanyRequestLogService->insuranceCompanyRequestLogRepository->getByInsuranceCompanyId($insuranceCompanyId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceCompanyRequestLog
     *
     * @group InsuranceCompanyRequestLog - СтрахованияКомпанияЗапросЛог
     */
    public function getById($id): Response|Application|InsuranceCompanyRequestLogResource|ResponseFactory
    {
        if ($model = $this->insuranceCompanyRequestLogService->insuranceCompanyRequestLogRepository->getById($id)) {
            return new InsuranceCompanyRequestLogResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
