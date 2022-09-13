<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\InsuranceLinkReferRecordService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceLinkReferRecord\InsuranceLinkReferRecordCollection;
use App\Http\Resources\InsuranceLinkReferRecord\InsuranceLinkReferRecordResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceLinkReferRecordController extends Controller
{
    protected InsuranceLinkReferRecordService $insuranceLinkReferRecordService;
    public function __construct(InsuranceLinkReferRecordService $insuranceLinkReferRecordService)
    {
        $this->insuranceLinkReferRecordService  =   $insuranceLinkReferRecordService;
    }

    /**
     * Получить список - InsuranceLinkReferRecord
     *
     * @group InsuranceLinkReferRecord
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceLinkReferRecordService->insuranceLinkReferRecordRepository->count([]),
            MainContract::DATA  =>  new InsuranceLinkReferRecordCollection($this->insuranceLinkReferRecordService->insuranceLinkReferRecordRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - InsuranceLinkReferRecord
     *
     * @group InsuranceLinkReferRecord
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceLinkReferRecordService->insuranceLinkReferRecordRepository->count([
                MainContract::USER_ID   =>  $userId
            ]),
            MainContract::DATA  =>  new InsuranceLinkReferRecordCollection($this->insuranceLinkReferRecordService->insuranceLinkReferRecordRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через InsuranceCompanyID - InsuranceLinkReferRecord
     *
     * @group InsuranceLinkReferRecord
     */
    public function getByInsuranceCompanyId($insuranceCompanyId,$skip,$take): Response|InsuranceLinkReferRecordCollection|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->insuranceLinkReferRecordService->insuranceLinkReferRecordRepository->count([
                MainContract::INSURANCE_COMPANY_ID  =>  $insuranceCompanyId
            ]),
            MainContract::DATA  =>  new InsuranceLinkReferRecordCollection($this->insuranceLinkReferRecordService->insuranceLinkReferRecordRepository->getByInsuranceCompanyId($insuranceCompanyId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceLinkReferRecord
     *
     * @group InsuranceLinkReferRecord
     */
    public function getById($id): Response|InsuranceLinkReferRecordResource|Application|ResponseFactory
    {
        if ($model = $this->insuranceLinkReferRecordService->insuranceLinkReferRecordRepository->getById($id)) {
            return new InsuranceLinkReferRecordResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
