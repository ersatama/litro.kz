<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\CurrencyService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Currency\CurrencyCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrencyController extends Controller
{
    protected CurrencyService $currencyService;
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService  =   $currencyService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->currencyService->count([]),
            ],
            MainContract::DATA  =>  new CurrencyCollection($this->currencyService->get($skip,$take))
        ],200);
    }

}
