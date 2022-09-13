<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\SPartnerServiceCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SPartnerServiceCategory\SPartnerServiceCategoryCollection;
use App\Http\Resources\SPartnerServiceCategory\SPartnerServiceCategoryResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SPartnerServiceCategoryController extends Controller
{
    protected SPartnerServiceCategoryService $SPartnerServiceCategoryService;
    public function __construct(SPartnerServiceCategoryService $SPartnerServiceCategoryService)
    {
        $this->SPartnerServiceCategoryService   =   $SPartnerServiceCategoryService;
    }

    /**
     * Получить список - SPartnerServiceCategory
     *
     * @group SPartnerServiceCategory
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->SPartnerServiceCategoryService->SPartnerServiceCategoryRepository->count([]),
            MainContract::DATA  =>  new SPartnerServiceCategoryCollection($this->SPartnerServiceCategoryService->SPartnerServiceCategoryRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - SPartnerServiceCategory
     *
     * @group SPartnerServiceCategory
     */
    public function getById($id): SPartnerServiceCategoryResource|Response|Application|ResponseFactory
    {
        if ($model = $this->SPartnerServiceCategoryService->SPartnerServiceCategoryRepository->getById($id)) {
            return new SPartnerServiceCategoryResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
