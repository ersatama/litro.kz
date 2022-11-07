<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\InsuranceImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceImage\InsuranceImageCollection;
use App\Http\Resources\InsuranceImage\InsuranceImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsuranceImageController extends Controller
{
    protected InsuranceImageService $insuranceImageService;
    public function __construct(InsuranceImageService $insuranceImageService)
    {
        $this->insuranceImageService    =   $insuranceImageService;
    }

    /**
     * Получить список - InsuranceImage
     *
     * @group InsuranceImage
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->insuranceImageService->insuranceImageRepository->count([]),
            Contract::DATA  =>  new InsuranceImageCollection($this->insuranceImageService->insuranceImageRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - InsuranceImage
     *
     * @group InsuranceImage
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->insuranceImageService->insuranceImageRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new InsuranceImageCollection($this->insuranceImageService->insuranceImageRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через InsuranceCompanyID - InsuranceImage
     *
     * @group InsuranceImage
     */
    public function getByInsuranceCompanyId($insuranceCompanyId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->insuranceImageService->insuranceImageRepository->count([
                Contract::INSURANCE_COMPANY_ID  =>  $insuranceCompanyId
            ]),
            Contract::DATA  =>  new InsuranceImageCollection($this->insuranceImageService->insuranceImageRepository->getByInsuranceCompanyId($insuranceCompanyId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - InsuranceImage
     *
     * @group InsuranceImage
     */
    public function getById($id): Response|InsuranceImageResource|Application|ResponseFactory
    {
        if ($model = $this->insuranceImageService->insuranceImageRepository->getById($id)) {
            return new InsuranceImageResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
