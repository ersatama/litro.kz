<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Services\CardCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardCategory\CardCategoryCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardCategoryController extends Controller
{
    protected CardCategoryService $cardCategoryService;
    public function __construct(CardCategoryService $cardCategoryService)
    {
        $this->cardCategoryService  =   $cardCategoryService;
    }

    /**
     * Получить список - CardCategory
     *
     * @group CardCategory - КарточкаКатегория
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->cardCategoryService->cardCategoryRepository->count([]),
            Contract::DATA  =>  new CardCategoryCollection($this->cardCategoryService->cardCategoryRepository->get($skip,$take))
        ],200);
    }
}
