<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
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

    /**
     * Получить список - Currency
     *
     * @group Currency - Валюта
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->currencyService->currencyRepository->count([]),
            Contract::DATA  =>  new CurrencyCollection($this->currencyService->currencyRepository->get($skip,$take))
        ],200);
    }

}
