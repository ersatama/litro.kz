<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\SPartnerPointCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SPartnerPointCategory\SPartnerPointCategoryCollection;
use App\Http\Resources\SPartnerPointCategory\SPartnerPointCategoryResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SPartnerPointCategoryController extends Controller
{
    protected SPartnerPointCategoryService $SPartnerPointCategoryService;
    public function __construct(SPartnerPointCategoryService $SPartnerPointCategoryService)
    {
        $this->SPartnerPointCategoryService =   $SPartnerPointCategoryService;
    }

    /**
     * Получить список - SPartnerPointCategory
     *
     * @group SPartnerPointCategory
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->SPartnerPointCategoryService->SPartnerPointCategoryRepository->count([]),
            MainContract::DATA  =>  new SPartnerPointCategoryCollection($this->SPartnerPointCategoryService->SPartnerPointCategoryRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через SPartnerPointID - SPartnerPointCategory
     *
     * @group SPartnerPointCategory
     */
    public function getBySPartnerPointId($sPartnerPointId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->SPartnerPointCategoryService->SPartnerPointCategoryRepository->count([
                MainContract::S_PARTNER_POINT_ID    =>  $sPartnerPointId
            ]),
            MainContract::DATA  =>  new SPartnerPointCategoryCollection($this->SPartnerPointCategoryService->SPartnerPointCategoryRepository->getBySPartnerPointId($sPartnerPointId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - SPartnerPointCategory
     *
     * @group SPartnerPointCategory
     */
    public function getById($id): Response|SPartnerPointCategoryResource|Application|ResponseFactory
    {
        if ($model = $this->SPartnerPointCategoryService->SPartnerPointCategoryRepository->getById($id)) {
            return new SPartnerPointCategoryResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
