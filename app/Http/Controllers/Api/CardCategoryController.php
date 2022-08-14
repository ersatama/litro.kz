<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
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

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->cardCategoryService->count([]),
            ],
            MainContract::DATA  =>  new CardCategoryCollection($this->cardCategoryService->get($skip,$take))
        ],200);
    }

}
